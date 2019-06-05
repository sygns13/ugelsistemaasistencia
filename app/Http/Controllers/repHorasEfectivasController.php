<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;
use App\Personal;
use App\Tipouser;
use App\User;

use App\Turno;
use App\Configdia;
use App\Institucion;

use App\Datoscolegio;
use App\Nivel;
use App\Tipogestion;
use App\Tipoie;
use App\Grado;
use App\Seccion;
use App\Asistenciapersonal;
use App\Feriado;

use Validator;
use Auth;
use DB;
use Storage;
use stdClass;
use DateTime;

set_time_limit(600);

class repHorasEfectivasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index1()
    {
        if(accesoUser([1,2,3])){

            $iduser=Auth::user()->id;

            $idtipouser=Auth::user()->tipouser_id;
            $tipouser=Tipouser::find($idtipouser);       
            $imagenPerfil="";
            $modulo="repHorasEfectivas";

              $fecharep=date("d/m/Y");
              $fecha=date("Y-m-d");



            return view('rephorasefectivas.index',compact('modulo','imagenPerfil','tipouser','fecharep','fecha'));

        }
            else
        {
            return view('adminlte::home');           
        }
    }





   public function index(Request $request)
    {
        $institucion="";
                $iduser=Auth::user()->id;
        $idtipouser=Auth::user()->tipouser_id;
        $tipouser=Tipouser::find($idtipouser);

        //$nivels=Nivel::where('activo','1')->where('borrado','0')->get();

            if($idtipouser=="3"){

                $user=User::findOrFail($iduser);
                $persona=Persona::findOrFail($user->persona_id);

                $personal=Personal::where('persona_id',$persona->id)->get();
                $idIE="";
                foreach ($personal as $key => $dato) {
                     $idIE=$dato->institucion_id;
                }

                //$institucion=Institucion::where('id',$idIE)->where('activo','1')->where('borrado','0')->where('tipo','2')->paginate(35);

                $institucion=DB::table('institucions')
                ->leftJoin('datoscolegios', 'datoscolegios.institucion_id', '=', 'institucions.id')
                
                ->where('institucions.borrado','0')
                ->where('institucions.id',$idIE)

                ->select('institucions.id','institucions.nombre as nombre','institucions.direccion','institucions.telefono','institucions.correo','institucions.activo','institucions.tipo','datoscolegios.id as idcolegio','datoscolegios.zona','datoscolegios.codigomod','datoscolegios.clave8','datoscolegios.modalidad')->get();
            }
            else{
               // $institucion=Institucion::where('activo','1')->where('borrado','0')->where('tipo','2')->get()->paginate(35);;
                 $institucion=DB::table('institucions')
                 ->leftJoin('datoscolegios', 'datoscolegios.institucion_id', '=', 'institucions.id')
                ->where('institucions.borrado','0')

                ->select('institucions.id','institucions.nombre as nombre','institucions.direccion','institucions.telefono','institucions.correo','institucions.activo','institucions.tipo','datoscolegios.id as idcolegio','datoscolegios.zona','datoscolegios.codigomod','datoscolegios.clave8','datoscolegios.modalidad')->get();
            }

            $ugels=Institucion::find(1);

            $ugel=$ugels->nombre;


            return [

            'institucions'=>$institucion,
            'ugel'=>$ugel
        ];
    }


        public function buscar1(Request $request)
        {
            $idInsti=$request->idInsti;
            $fecha=$request->fecha;

            $reporte=DB::select("select i.id as idInsti, p.id as idPersonal, pe.doc as dni, pe.nombres, pe.apellidos, p.jornada_lab, p.gradorep, p.seccionrep, p.especialidad,
ifnull(if(a.tipo=1,a.horas,IF(a.tipo=0,'I',IF(a.tipo=3,'J',IF(a.tipo=4,'F',if(a.tipo=2,a.horas,null))))),'I') as asistencia
from institucions i
inner join personals p on p.institucion_id=i.id
inner join personas pe on pe.id=p.persona_id
left join asistenciapersonals a on a.personal_id=p.id and a.fecha='".$fecha."'
where i.id='".$idInsti."' and p.hefectivas='1';");

            $result='1';
    $msj='Datos Consultados';


            return [

            'reporte'=>$reporte,
            'result'=>$result,
            'msj'=>$msj
        ];


        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
