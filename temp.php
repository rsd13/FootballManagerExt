<?php

Metodos de Jugador

public function perfil($id){
      Jugador::findOrFail($id);
      return view('perfil');
}

public function getJugador($id){
      return view('jugador',['jugador' => Jugador::find($id)]);
}

public function getJugadores(Request $request=null){
      $jugadores = Jugador::join('equipo','jugador.equipo','=','equipo.id')->select('jugador.*','equipo.nombreEquipo');
      $equipo = $request->equipoSel;
      $posicion = $request->posicion;
      if($equipo != "Todos" && $equipo != null){
            $equipo = Equipo::find($equipo);
            $jugadores = $equipo->jugadores();
            $equipo = $equipo->nombreEquipo;
      }
      else{
            $equipo = 'Todos';
      }
      if($posicion != "Todas" && $posicion != null){
            $jugadores = $jugadores->where('jugador.posicion','=',$posicion);
      }
      return view('jugadores',[
                  'jugadores' => $jugadores->orderby('equipo')->orderBy('dorsal')->paginate(20),
                  'equipo' => $equipo,
                  'equipos' => Equipo::get(),
                  'entrenadorNombre' => 'Ninguno',
                  'entrenadorApellidos' => 'Ninguno'
      ]);
}

//Devuelve la plantilla del equipo al que pertenece el jugador
public function getPlantilla($id){
      return Jugador::where('equipo','=',$id)->get()->toArray();
}

//Devuelve el formulario de creación del getJugador
public function formulario(){
      return view('crearJugador', array(
            'listaEquipos' => Equipo::orderBy('nombreEquipo')->get()
            )
      );
}

public function crearJugador(Request $request){
      //Control de errores
      $errors = false;
      $validator = Validator::make($request->all(), []);
      //Rellenar jugador
      $jugador = new Jugador();
      $jugador->dni = $request->dni;
      $jugador->nombre = $request->nombre;
      $jugador->apellidos = $request->apellidos;
      $jugador->fNac = $request->date;
      $jugador->posicion = $request->posicion;
      $jugador->cargo = $request->cargo;
      $jugador->dorsal = $request->dorsal;
      $jugador->equipo = $request->equipo;

      //Gestión del dorsal
      $jugadores = Jugador::all();
      //dd($jugadores);
      foreach($jugadores as $jug){
            if($jugador->dorsal == $jug->dorsal && $jugador->equipo == $jug->equipo){
                  $errorDorsal = $jug->nombre.' ya tiene esa dorsal';
                  $validator->getMessageBag()->add('dorsal', $errorDorsal);
                  $errors = true;
            }
      }
      //Intentamos insertar el jugador
      try{
            $jugador->save();
      } catch(QueryException $e){
            $validator->getMessageBag()->add('dni','Ese DNI ya existe');
            $errors = true;
      }
      if($errors) return Redirect::back()->withErrors($validator)->withInput();

      return Redirect::to('jugadores');
}

public function editar(){
      return view('editarJugadores',[
            'values' => [
                  'nombre' =>'Nombre',
                  'apellidos'=>'Apellidos',
                  'fNac'=>'Fecha de Nacimiento',
                  'posicion'=>'Posición',
                  'dorsal'=>'Dorsal',
                  'nombreEquipo' => 'Equipo'],
                  'lista' => Jugador::join('equipo','jugador.equipo','=','equipo.id')->select('jugador.*','equipo.nombreEquipo')->orderby('equipo')->orderBy('dorsal')->paginate(20),
                  'equipo' => 'Todos',
                  'equipos' => Equipo::get(),
                  'entrenadorNombre' => 'Ninguno',
                  'entrenadorApellidos' => 'Ninguno'
            ]
      );
}

public function editarJugadoresEquipo($id){
      $team = Equipo::find($id);
      return view('editarJugadores', array(
      'values' => array(
            'nombre'=>'Nombre',
            'apellidos'=>'Apellidos',
            'fNac'=>'Fecha de Nacimiento',
            'posicion'=>'Posición',
            'dorsal'=>'Dorsal'),
            'lista' => $team->jugadores()->orderBy('apellidos')->simplePaginate(15),
            'equipo' => $team->nombreEquipo,
            'equipos' => Equipo::get(),
            'entrenadorNombre' => 'Ninguno',
            'entrenadorApellidos' => 'Ninguno'
            )
      );
}

public function editarJugador($id){
      return view('modificarJugador', ['jugador' => Jugador::find($id),'equipos' => Equipo::get()]);
}

public function eliminar($id){
      $jugador = Jugador::find($id);
      $jugador->delete();
      return back();
}

public function editarJugadorPost(Request $request, $id){
      $jugador = Jugador::find($id);
      $jugador->dni = $request->dni;
      $jugador->nombre = $request->nombre;
      $jugador->apellidos = $request->apellidos;
      $jugador->fNac = $request->fNac;
      $jugador->posicion = $request->posicion;
      $jugador->cargo = $request->cargo;
      $jugador->dorsal = $request->dorsal;
      $jugador->equipo = $request->equipo;
      $jugador->save();
      return redirect()->action('JugadorController@editar');
}

*/




/*
Metodos de Entrenador

public function getEntrenadores(Request $request){
$sort = $request->input('sort');
$type = $request->input('type');
$correctSort = false;
$entrenadores = Entrenador::join('equipo','equipo.id', '=','entrenador.equipo')
->select('entrenador.*','equipo.nombreEquipo')->orderBy($sort,$type)->simplePaginate(8);

$values = array(
               'dni' => 'DNI',
               'nombre'=>'Nombre',
               'apellidos'=>'Apellidos',
               'fNac'=>'Fecha de Nacimiento',
               'nombreEquipo' => 'Equipo');


foreach($values as $value) if($sort == strtolower($value)) $correctSort = true;
//Caso especial: fNac
if($sort == 'fnac') $sort = 'fNac';
if($correctSort == false && $request->has('sort')){
         return redirect('entrenadores');
}
return view('editarEntrenador', array(
                           'values' => $values,
                           'lista' => $entrenadores,
                           'controller' => array(
                                       'name' =>  'EntrenadorController@getEntrenadores',
                                       'type' => $type,
                                       'sort' => $sort
                                 )
                        )
         );
}

public function entrenador($id){
return view('entrenador',array('user'=> Entrenador::find($id)));
}

//Devuelve el formulario de creación del entrenador
public function formulario(){
   return view('crearEntrenador', array(
                     'listaEquipos' => Equipo::orderBy('nombreEquipo')->get()
                     )
         );
}
public function formularioModificar($id){

   $entrenador = Entrenador::find($id);

   return view('modificarEntrenador', [
                     'listaEquipos' => Equipo::orderBy('nombreEquipo')->get(),
                     'idmodificar' => $id,
                     'listaEntrenador' => $entrenador]

         );
}



public function crearEntrenador(Request $request){
   $entrenador = new Entrenador();
   $entrenador->dni = $request->dni;//Importante
   $entrenador->nombre = $request->nombre;
   $entrenador->apellidos = $request->apellidos;
   $entrenador->fNac = $request->date;

   $idLibre = Equipo::where('nombreEquipo','like','%Libre%')->first();

   //miro si existe ya un entrenador con un equipo
   $cantidadEquipo = Entrenador::where('equipo','=', $request->equipo)->count();
   //miro si el equipo es libre
   $entrenadorEquipo = Entrenador::where('equipo','=', $request->equipo)->first();

   //si no hay entrenador en el equipo
   //si el equipo es libre puede haber mas de uno
   // y si se cambia al mismo equipo perteneciente
   if($cantidadEquipo > 0 && $request->equipo != $idLibre->id){
         $ok = true;
   }else $ok = false;

   return $this->captarErrores($request,$entrenador,$ok);
}


public function borrarEntrenador ($id){
   $entrenador = Entrenador::find($id);
   $entrenador->delete();
   return back();
}


public function modificarEntrenador (Request $request,$id){
   $entrenador = Entrenador::find($id);

   $entrenador->dni = $request->dni;
   $entrenador->nombre = $request->nombre;
   $entrenador->apellidos = $request->apellidos;
   $entrenador->fNac = $request->date;
   $aux = $request->equipo;

   $idLibre = Equipo::where('nombreEquipo','like','%Libre%')->first();

   //miro si existe ya un entrenador con un equipo
   $cantidadEquipo = Entrenador::where('equipo','=', $request->equipo)->count();
   //miro si el equipo es libre
   $entrenadorEquipo = Entrenador::where('equipo','=', $request->equipo)->first();

   //si no hay entrenador en el equipo
   //si el equipo es libre puede haber mas de uno
   // y si se cambia al mismo equipo perteneciente
   if($cantidadEquipo > 0 && $request->equipo != $idLibre->id
   && $request->equipo != $entrenador->equipo){
         $ok = true;
   }else $ok = false;
   return $this->captarErrores($request,$entrenador,$ok);

}


public function captarErrores($request, $entrenador,$ok){

   if($ok){
         $validator = Validator::make($request->all(), [
               'title' => '2',
               'body' => '2',
         ]);
         $validator->getMessageBag()->add('unique','Error, solo puede haber un entrenador por equipo.');
         return  back()->withErrors($validator)->withInput();

   }else{

         try{
               //le pongo el valor aqui para poder hacer la condicion en el if
               $entrenador->equipo = $request->equipo;
               $entrenador->save();
               return Redirect::to('entrenadores');
         }
         catch(\Illuminate\Database\QueryException $e){
               $validator = Validator::make($request->all(), [
               'title' => '2',
               'body' => '2',
         ]);
               $validator->getMessageBag()->add('unique','Error, el DNI introducido ya existe.');
               return back()->withErrors($validator)->withInput();
         }
   }
}