<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use App\Equipo;
use App\Partido;
use App\Estadio;
use App\Patrocinador;
use App\Usuario;
use App\Participar;
use Carbon\Carbon;
use Validator;

use Intervention\Image\ImageManagerStatic as Image;


class EquipoController extends Controller
{
      public function getHome(Request $request){
            $messages = new MessageBag();
            $UA = Equipo::where('nombreEquipo','like','%UA%')->first();
            if($UA == null){
                  $messages->add('UA','No hay equipo de la UA');
            }
            else{
                  $ultLocal = $UA->partidosLocal()->where('fecha','<',Carbon::now())->get();
                  $ultVisitante = $UA->partidosVisitante()->where('fecha','<',Carbon::now())->get();
                  $proxLocal = $UA->partidosLocal()->where('fecha','>',Carbon::now())->get();
                  $proxVisitante = $UA->partidosVisitante()->where('fecha','>',Carbon::now())->get();
                  $ultimosPartidos = $ultLocal->merge($ultVisitante)->sortByDesc('fecha');
                  //obtengo el ultimo partido
                  $ultimoPartido = $ultimosPartidos->first();
                  //si no hay partidos que salte el error
                  if($ultimoPartido == null){
                        $messages->add('unique','Error, No hay partidos.');
                  }
            }

            if($messages->isEmpty()){

                  $participarTitular = Participar::with('usuario')
                  ->where('partido_id','=', $ultimoPartido->id)
                  ->where('asistencia','=',1)->get();

                  $participarBanquillo = Participar::with('usuario')
                  ->where('partido_id','=',$ultimoPartido->id)
                  ->where('asistencia','=',2)->get();

                  return view('home',[
                        'equipos' => Equipo::get(),
                        'estadios' => Estadio::get(),
                        'ultimoPartido' =>  $ultimoPartido,
                        'titulares' => $participarTitular,
                        'banquillo' => $participarBanquillo,
                        'ultPartidos' => $ultimosPartidos->take(5),
                        'proxPartidos' => $proxLocal->merge($proxVisitante)->sortBy('fecha')->take(5)
                  ]);
            }
            return view('home',[
                  'equipos' => null,
                  'estadios' => null,
                  'ultimoPartido' =>  null,
                  'titulares' => null,
                  'banquillo' => null,
                  'ultPartidos' => null,
                  'proxPartidos' => null
            ])->withErrors($messages);

      }

      public function configuracion(){
            return view('configuracion');
      }

      public function formulario(){
            return view('config.equipo.crear');
      }

      public function crearEquipo(Request $request){

            $estadio = new Estadio();
            $estadio->nombre = $request->input('estadioNombre');
            $estadio->capacidad = $request->input('aforo');

            $equipo = new Equipo(); //Si falla el crear equipo el Estadio sigue creado
            $equipo->cif = $request->input('cif');
            $equipo->nombreEquipo = $request->input('equipoNombre');
            $equipo->presupuesto = $request->input('presupuesto');
            $equipo->logo = '';
            //Por defecto se crea sin ningun patrocinador.
            $patrocinador = Patrocinador::where('nombre','=','libre')->first();
            $equipo->patrocinador_id = $patrocinador->id;
            //consigo el nuevo estadio

            return $this->captarErrores($estadio,$equipo,$request);
      }


      public function getEquipo($id){
            return view('equipo',[
                  'equipo' => Equipo::find($id)
            ]);
      }

      public function getEquipos(){
            //consigo todos los equipos con los estadios
            $team = Equipo::with('estadio','patrocinador')->paginate(10);

            return view('equipos',[
                  'lista' => $team
            ]);
      }

      public function editar(){
            $team = Equipo::with('estadio','patrocinador')->paginate(10);
            return view('config.equipo.editar',['lista' => $team]);
      }

      public function modificarEquipo($id){
            if($id == Equipo::where('nombreEquipo','=','Libre')->first()->id){
                  return Redirect::back()->withErrors('No se puede editar ese equipo');
            }
            $equipo = Equipo::find($id);
            return view('config.equipo.modificar',[
                  'equipo' => $equipo,
                  'estadio' => $equipo->estadio()->first()
            ]);
      }


      public function modificarEquipoPost(Request $request, $id){
            $equipo = Equipo::find($id);
            $equipo->cif = $request->cif;
            $equipo->nombreEquipo = $request->nombreEquipo;
            $equipo->presupuesto = $request->presupuesto;

            $estadio = Estadio::find($equipo->estadio_id);
            $estadio->nombre = $request->nombre;
            $estadio->capacidad = $request->capacidad;

            if($request->foto != null ){
                  try{
                        Image::make($request->file('foto')->getRealPath())->fit(150)->encode('png')->save('images/escudos/'.$equipo->cif.'.png');
                        $equipo->logo = $equipo->cif . '.png';
                  }catch(\Intervention\Image\Exception\NotReadableException $e){
                        $validator->getMessageBag()->add('foto','Foto demasiado grande');
                  }
            }
            else{
                  $equipo->foto = $equipo->cif . '.png';
            }

            try{
                  //le pongo el valor aqui para poder hacer la condicion en el if
                  $estadio->save();
                  $equipo->estadio_id = Estadio::where('nombre','=', $estadio->nombre)->first()->id;
                  $equipo->save();
                  //creo partidos con el nuevo equipo

                  return Redirect::to('/partido');
            }
            catch(\Illuminate\Database\QueryException $e){
                  $validator = Validator::make($request->all(), [
                        'title' => '2',
                        'body' => '2',
                  ]);
                  $validator->getMessageBag()->add('unique','Error, el CIF introducido ya existe.');
                  return back()->withErrors($validator)->withInput();
            }
      }

      public function captarErrores($estadio,$equipo,$request){
            try{
                  //le pongo el valor aqui para poder hacer la condicion en el if
                  $estadio->save();
                  $equipo->estadio_id = Estadio::where('nombre','=', $estadio->nombre)->first()->id;
                  $equipo->save();
                  //creo partidos con el nuevo equipo

                  return Redirect::to('/partido');
            }
            catch(\Illuminate\Database\QueryException $e){
                  $validator = Validator::make($request->all(), [
                        'title' => '2',
                        'body' => '2',
                  ]);
                  $validator->getMessageBag()->add('unique','Error, el CIF introducido ya existe.');
                  return back()->withErrors($validator)->withInput();
            }
      }




      public function eliminar($id){
            $equipo = Equipo::find($id);
            $equipoLibre = Equipo::where('nombreEquipo','=','Libre')->first();
            $equipoUA = Equipo::where('nombreEquipo','like','%UA%')->first();
            if($equipo->id == $equipoLibre->id || $equipo->id == $equipoUA->id){
                  $messages = new MessageBag();
                  $messages->add('error','No se puede eliminar ese equipo.');
                  return back()->withErrors($messages)->withInput();
            }
            foreach($equipo->usuarios as $usuario){
                  $user = Usuario::find($usuario->id);
                  $user->dorsal = 0;
                  $user->salario = 0;
                  $user->equipo_id = $equipoLibre->id;
                  $user->save();
            }
            $estadio = $equipo->estadio()->first();
            $estadio->delete();
            $equipo->delete();
            return Redirect::action('EquipoController@getEquipos');
      }
}
