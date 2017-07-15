<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Validator;
use App\Equipo;
use App\Participar;
use App\Partido;
use App\Temporada;
use App\Estadio;
use App\Usuario;
use App\Competicion;


class PartidoController extends Controller
{
    public function getPartido($idPartido){
        //recojo los datos del partido
        $partido = Partido::with('equipoLocal','equipoVisitante')
        ->where('id','=',$idPartido)->first();
        
        $cantidad = Participar::where('partido_id','=',$idPartido)->count();


        $participarTitular = Participar::with('usuario')
        ->where('partido_id','=',$idPartido)
        ->where('asistencia','=',1)->get();


         $participarBanquillo = Participar::with('usuario')
        ->where('partido_id','=',$idPartido)
        ->where('asistencia','=',2)->get();

        
        if($cantidad != null){
             return view ('config/partido/perfilPartido',[ 'partido' => $partido
             ,'cantidad' => $cantidad,'titulares' => $participarTitular,
             'banquillo'  =>  $participarBanquillo]);
        }else{
            return view ('config/partido/perfilPartido',[ 'partido' => $partido
            ,'cantidad' => $cantidad]);
        }
    }


    public function getPartidos(Request $request){

        //Manejo de variables
        $equipo1    =   $request->input('equipo1','Todos');
        $equipo2    =   $request->input('equipo2','Todos');
        $temporada  =   $request->input('temporada','Todas');
        $competicion=   $request->input('competicion','Todas');
        $results    =   $request->input('results',15);
        $partidoVista = 'partidos';


        //Gestión de partidos where('rol','=',$rol)
        $partidos = Partido::with('competicion','temporada',
                'equipoLocal','equipoVisitante','estadio');

        //PARTE DE EQUIPOS
        //Condición 1: A contra B
        if($equipo1 != 'Todos' && $equipo2 != 'Todos'){
            $partidos = $partidos
                ->where([
                    ['equipoLocal_id','=',$equipo1],
                    ['equipoVisitante_id','=',$equipo2]
                    ])
                ->orWhere([
                    ['equipoLocal_id','=',$equipo2],
                    ['equipoVisitante_id','=',$equipo1]
                    ]);
        }
        //Condición 2: A contra todos ->orWhere('equipoLocal','=',$equipo1);
        else if($equipo1 != 'Todos' && $equipo2 == 'Todos'){
            $partidos = $partidos
                ->where([
                    ['equipoLocal_id','=',$equipo1]
                    ])
                ->orWhere([
                    ['equipoVisitante_id','=',$equipo1]
                    ]);
        }
        //PARTE DE TEMPORADA
        if($temporada != 'Todas'){
            $partidos = $partidos->where('temporada_id','=',$temporada);
        }
        //PARTE DE COMPETICIÓN
        if($competicion != 'Todas'){
            $partidos = $partidos->where('competicion_id','=',$competicion);
        }


        return view($partidoVista, [
                'partidos' => $partidos->orderBy('competicion_id')->orderBy('fecha')->paginate($results),
                'equipos'  => Equipo::get(),
                'equipo1'  => $equipo1,
                'equipo2'  => $equipo2,
                'temporadas'=>Temporada::get(),
                'temporada'=> $temporada,
                'competiciones' =>Competicion::get(),
                'competicion'=> $competicion,
                'results' => $results
                ]);
    }




    public function editarPartidos(Request $request){
        //Manejo de variables
        $equipo1    =   $request->input('equipo1','Todos');
        $equipo2    =   $request->input('equipo2','Todos');
        $temporada  =   $request->input('temporada','Todas');
        $competicion=   $request->input('competicion','Todas');
        $results    =   $request->input('results',15);
        $partidoVista = 'config/partido/editarPartidos';


        //Gestión de partidos where('rol','=',$rol)
        $partidos = Partido::with('competicion','temporada',
                'equipoLocal','equipoVisitante','estadio');

        //PARTE DE EQUIPOS
        //Condición 1: A contra B
        if($equipo1 != 'Todos' && $equipo2 != 'Todos'){
            $partidos = $partidos
                ->where([
                    ['equipoLocal_id','=',$equipo1],
                    ['equipoVisitante_id','=',$equipo2]
                    ])
                ->orWhere([
                    ['equipoLocal_id','=',$equipo2],
                    ['equipoVisitante_id','=',$equipo1]
                    ]);
        }
        //Condición 2: A contra todos ->orWhere('equipoLocal','=',$equipo1);
        else if($equipo1 != 'Todos' && $equipo2 == 'Todos'){
            $partidos = $partidos
                ->where([
                    ['equipoLocal_id','=',$equipo1]
                    ])
                ->orWhere([
                    ['equipoVisitante_id','=',$equipo1]
                    ]);
        }
        //PARTE DE TEMPORADA
        if($temporada != 'Todas'){
            $partidos = $partidos->where('temporada_id','=',$temporada);
        }
        //PARTE DE COMPETICIÓN
        if($competicion != 'Todas'){
            $partidos = $partidos->where('competicion_id','=',$competicion);
        }


        return view($partidoVista, [
                'partidos' => $partidos->paginate($results),
                'equipos'  => Equipo::get(),
                'equipo1'  => $equipo1,
                'equipo2'  => $equipo2,
                'temporadas'=>Temporada::get(),
                'temporada'=> $temporada,
                'competiciones' =>Competicion::get(),
                'competicion'=> $competicion,
                'results' => $results
                ]);
    }

    public function eliminarPartido($id){
        $participar = Participar::where('partido_id','=',$id)->first();
        //si no hay datos de partido borra el partido directamente
        if($participar == null){
            $partido = Partido::find($id);
            $partido->delete();
            return Redirect::to("/config/editar/partidos");
        }else{
            $participar = Participar::where('partido_id','=',$id)->get();
            //borramos todas las tablas de participar con el partido asociado
            foreach($participar as $p){
                $aux = Participar::find($p->id);
                $aux ->delete();
            }
            $partido = Partido::find($id);
            $partido->delete();
            return Redirect::to("/config/editar/partidos");
        }
    }


    public function formularioInsertar(Request $request){

        $equipos = Equipo::where('nombreEquipo','<>','Libre')->get();
        $temporadas = Temporada::with('partido')->get();
        $competiciones = Competicion::with('partido')->get();
        $validator = Validator::make($request->all(), [
            'title' => '2',
            'body' => '2',
        ]);


        if(count($temporadas) == 0){
            
            $validator->getMessageBag()->add('unique','No se puede crear partidos ,ya que, no existen temporadas.');

           return view ('config/partido/crearPartido',[ 'competiciones' => null,
            'equipos' => null,'temporadas' => null])->withErrors($validator->getMessageBag());

        }else if(count($competiciones) == 0){
                $validator->getMessageBag()->add('unique','No se puede crear partidos ,ya que, no existen competiciones.');
                return view ('config/partido/crearPartido',[ 'competiciones' => $competiciones,
                'equipos' => $equipos,'temporadas' =>$temporadas])->withErrors($validator->getMessageBag());

        }else{
            return view ('config/partido/crearPartido',[ 'competiciones' => $competiciones,
            'equipos' => $equipos,'temporadas' => $temporadas]);
        }
    }

    public function crearPartido(Request $request){


        //busco la temporada

        $temporada = Temporada::find($request->temporada_id);
        
        if($request->fecha >= $temporada->inicio && $request->fecha <= $temporada->fin){

            $partido = new Partido();
            $partido->equipoLocal_id = $request->equipoLocal;
            $partido->equipoVisitante_id = $request->equipoVisitante;
            $partido->temporada_id = $request->temporada_id;
            $partido->competicion_id = $request->competicion_id;
            $partido->golesLocal = $request->golesLocal;
            $partido->golesVisitante = $request->golesVisitante;
            $partido->fecha = $request->fecha;
            $partido->cronica = null;

            $equipo = Equipo::find($request->equipoLocal);

            $partido->estadio_id = $equipo->estadio_id;

            return $this->verErrores($partido,$request,true);
        }else{
            $validator = Validator::make($request->all(), [
            'title' => '2',
            'body' => '2',
            ]);
            $validator->getMessageBag()->add('unique','Error, la fecha introducida tiene que estar entre la temporada indicada.
            La temporada ' . $temporada->nombre . ' empieza en ' . $temporada->inicio . ' y termina en ' . $temporada->fin);
            return back()->withErrors($validator)->withInput();

        }


    }


    public function modificarPartido(Request $request,$id){
        $partido = Partido::find($id);

        //miro si se ha modificado algun equipo
        //para borrar los datos de modificarPartido

        if( $partido->equipoLocal_id ==  $request->equipoLocal
        &&  $partido->equipoVisitante_id ==  $request->equipoVisitante){
            $igual = true;
        }else{
            $igual = false;
        }

        $partido->equipoLocal_id = $request->equipoLocal;
        $partido->equipoVisitante_id = $request->equipoVisitante;
        $partido->temporada_id = $request->temporada_id;
        $partido->competicion_id = $request->competicion_id;
        $partido->golesLocal = $request->golesLocal;
        $partido->golesVisitante = $request->golesVisitante;
        $partido->fecha = $request->fecha;
        $partido->cronica = null;

        $equipo = Equipo::find($request->equipoLocal);

        $partido->estadio_id = $equipo->estadio_id;

        return $this->verErrores($partido,$request,$igual);


    }



    public function formularioModificar($id){

        $equipos = Equipo::where('nombreEquipo','<>','Libre')->get();
        $temporadas = Temporada::with('partido')->get();

        $competiciones = Competicion::with('partido')->get();

        return view ('config/partido/modificarPartido',[ 'competiciones' => $competiciones,
        'equipos' => $equipos,'temporadas' => $temporadas, 'idmodificar' => $id]);
    }


     public function verErrores($partido,$request,$igual){
        //si es el musmo equipo error
        if($partido->equipoLocal_id ==  $partido->equipoVisitante_id){
            $validator = Validator::make($request->all(), [
            'title' => '2',
            'body' => '2',
            ]);
            $validator->getMessageBag()->add('unique','Error, no se puede crear un partido con el mismo equipo.');
            return back()->withErrors($validator)->withInput();

        }else{

            try{
                $partido->save();
                if($igual == false){
                    $participar = Participar::where('partido_id','=',$partido->id)->get();
                    //borramos todas las tablas de participar con el partido asociado
                    foreach($participar as $p){
                        $aux = Participar::find($p->id);
                        $aux ->delete();
                    }
                }
                $valor= $partido->id;
                $valor=trim($valor);
                return Redirect::to("/config/partido/" . $valor);

            }
            //excecipon en la bbdd
            catch(\Illuminate\Database\QueryException $e){
                $validator = Validator::make($request->all(), [
                'title' => '2',
                'body' => '2',
                ]);
                $validator->getMessageBag()->add('unique','Error, existe ya un partido con las mismas caracteristicas');
                return back()->withErrors($validator)->withInput();
            }
        }
    }

}
