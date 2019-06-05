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
use App\Ciclo;

use Validator;
use Auth;
use DB;
use Storage;
use stdClass;
use DateTime;

set_time_limit(600);

class Anexo04Controller extends Controller
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
            $modulo="repAnexo04";

             // $fecharep=date("d/m/Y");
             // $fecha=date("Y-m-d");

            $anio=date("Y");
            $mes=intval(date("m"));



            return view('repanexo04.index',compact('modulo','imagenPerfil','tipouser','fecharep','anio','mes'));

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
            $anio=$request->anio;
            $mes=$request->mes;


            $reporte = array();

            $consulta1=DB::select("select i.id as idInsti, p.id as idPersonal, pe.doc as dni, pe.nombres, pe.apellidos, p.jornada_lab, p.gradorep, p.seccionrep, p.especialidad, n.nivel, i.turno, p.cargo, p.ley
from institucions i
inner join personals p on p.institucion_id=i.id
inner join personas pe on pe.id=p.persona_id
inner join datoscolegios dc on i.id=dc.institucion_id
inner join nivels n on n.id=dc.nivel_id
where i.id='".$idInsti."' and p.hefectivas='1';");

            $escolar=DB::select("select * FROM ciclos c where year(c.fechainicio)='".$anio."';");
            $ini="2018-01-01";
            $fin="2018-12-31";
            foreach ($escolar as $key => $ye) {
                $ini=$ye->fechainicio;
                $fin=$ye->fechafin;
            }


            $diasMes = cal_days_in_month(CAL_GREGORIAN, intval($mes), intval($anio)); 


                $diahoy=hoy();



            foreach ($consulta1 as $key => $dato) {

                $cont=0;
                $conTar=0;


                $diafin=date("d", mktime(0,0,0, $mes+1, 0, $anio));
                $sum=0;
                $totalhoras=0;

                $d1=0;
                $d2=0;
                $d3=0;
                $d4=0;
                $d5=0;
                $d6=0;
                $d7="";






                $cont2=1;

                $h=Date('Y-m-d');
                $hoy=new DateTime($h);

                for ($i=1; $i <=$diasMes ; $i++) { 

                        

                    $fecha=$anio.'-'.$mes.'-'.$i;

                    $date = new DateTime($fecha);
                    $cast = new DateTime($ini);
                    $cast2 = new DateTime($fin);

                    if($cast<=$date){
                        if($cast2<$date){
                            break;
                        }
                        else{

                            $tipodia=date("N",$date->getTimestamp());

                            $letradia=letraDita($tipodia);

                            

                            if(1==1){

                                $consulta2=DB::select(" 

select ifnull(if(a.tipo=1,'A',IF(a.tipo=0,'I',IF(a.tipo=3,'J',IF(a.tipo=4,'F',IF(a.tipo=5,'L',IF(a.tipo=6,'P',IF(a.tipo=7,'H',IF(a.tipo=2,'T',IF(a.tipo=8,'TP',null))))))))),'') as asistencia, a.hrastarde, a.mintarde, a.hrasper, a.minper,
c.activo as diaactivo
                                from personals p
                                left join configdias c on c.personal_id=p.id and c.tipodia_id='".$tipodia."'
                                left join asistenciapersonals a on a.personal_id=p.id and a.fecha='".$fecha."'
                                where p.hefectivas='1' and p.id='".$dato->idPersonal."';");

                                foreach ($consulta2 as $key2 => $repA) {
                                    $cont++;
                                    
                                    if($repA->asistencia=="I")
                                    {
                                        $d1++;
                                    }
                                    if($repA->asistencia=="L")
                                    {
                                        $d1++;
                                    }
                                    if($repA->asistencia=="T")
                                    {
                                        $d2=$d2+$repA->hrastarde;
                                        $d3=$d3+$repA->mintarde;
                                    }
                                    if($repA->asistencia=="P")
                                    {
                                        $d4=$d4+$repA->hrasper;
                                        $d5=$d5+$repA->minper;
                                    }
                                    if($repA->asistencia=="TP")
                                    {
                                        $d2=$d2+$repA->hrastarde;
                                        $d3=$d3+$repA->mintarde;

                                        $d4=$d4+$repA->hrasper;
                                        $d5=$d5+$repA->minper;
                                    }

                                    if($repA->asistencia=="H")
                                    {
                                        $d6++;

                                    }

                                }


                            }

                        }
                    }

                

                }


                if($d3>60){
                    $aux=intval($d3/60);
                    $d2=$d2+$aux;

                    $d3=$d3%60;
                }

                if($d5>60){
                    $aux2=intval($d5/60);
                    $d4=$d4+$aux2;

                    $d5=$d5%60;
                }



                $newobj = new stdClass();


                 $newobj->idInsti=$dato->idInsti;
                 $newobj->idPersonal=$dato->idPersonal;
                $newobj->dni=$dato->dni;
                $newobj->nombres=$dato->nombres;
                $newobj->apellidos=$dato->apellidos;
                $newobj->jornada_lab=$dato->jornada_lab;
                $newobj->gradorep=$dato->gradorep;
                $newobj->seccionrep=$dato->seccionrep;
                $newobj->especialidad=$dato->especialidad;
                $newobj->cargo=$dato->cargo;
                $newobj->ley=$dato->ley;

                 $newobj->d1=$d1;
                 $newobj->d2=$d2;
                 $newobj->d3=$d3;
                 $newobj->d4=$d4;
                 $newobj->d5=$d5;
                 $newobj->d6=$d6;
                 $newobj->d7=$d7;

                 $reporte[]=$newobj;
                
            }




            $result='1';
    $msj='Datos Consultados';


            return [

            'reporte'=>$reporte,
            'result'=>$result,
            'msj'=>$msj,
            'diasMes'=>$diasMes,
            'diahoy'=>$diahoy
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
