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

class Anexo03Controller extends Controller
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
            $modulo="repAnexo03";

             // $fecharep=date("d/m/Y");
             // $fecha=date("Y-m-d");

            $anio=date("Y");
            $mes=intval(date("m"));



            return view('repanexo03.index',compact('modulo','imagenPerfil','tipouser','fecharep','anio','mes'));

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


                $t1="";
                $t2="";
                $t3="";
                $t4="";
                $t5="";
                $t6="";
                $t7="";
                $t8="";
                $t9="";
                $t10="";
                $t11="";
                $t12="";
                $t13="";
                $t14="";
                $t15="";
                $t16="";
                $t17="";
                $t18="";
                $t19="";
                $t20="";
                $t21="";
                $t22="";
                $t23="";
                $t24="";
                $t25="";
                $t26="";
                $t27="";
                $t28="";
                $t29="";
                $t30="";
                $t31="";

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

                                    if($i==1){
                                        $t1=$letradia;

                                    }elseif($i==2){
                                   
                                        $t2=$letradia;
                                    }elseif($i==3){
                                       $t3=$letradia;
                                    }elseif($i==4){
                                       $t4=$letradia;
                                    }elseif($i==5){
                                       $t5=$letradia;
                                    }elseif($i==6){
                                       $t6=$letradia;
                                    }elseif($i==7){
                                       $t7=$letradia;
                                    }elseif($i==8){
                                       $t8=$letradia;
                                    }elseif($i==9){
                                       $t9=$letradia;
                                    }elseif($i==10){
                                        $t10=$letradia;
                                    }elseif($i==11){
                                        $t11=$letradia;
                                    }elseif($i==12){
                                        $t12=$letradia;
                                    }elseif($i==13){
                                        $t13=$letradia;
                                    }elseif($i==14){
                                        $t14=$letradia;
                                    }elseif($i==15){
                                        $t15=$letradia;
                                    }elseif($i==16){
                                        $t16=$letradia;
                                    }elseif($i==17){
                                        $t17=$letradia;
                                    }elseif($i==18){
                                        $t18=$letradia;
                                    }elseif($i==19){
                                        $t19=$letradia;
                                    }elseif($i==20){
                                        $t20=$letradia;
                                    }elseif($i==21){
                                        $t21=$letradia;
                                    }elseif($i==22){
                                        $t22=$letradia;
                                    }elseif($i==23){
                                        $t23=$letradia;
                                    }elseif($i==24){
                                        $t24=$letradia;
                                    }elseif($i==25){
                                        $t25=$letradia;
                                    }elseif($i==26){
                                        $t26=$letradia;
                                    }elseif($i==27){
                                        $t27=$letradia;
                                    }elseif($i==28){
                                        $t28=$letradia;
                                    }elseif($i==29){
                                        $t29=$letradia;
                                    }elseif($i==30){
                                        $t30=$letradia;
                                    }elseif($i==31){
                                        $t31=$letradia;
                                    }



                     }

                }
                }
            
            
                $diahoy=hoy();

                $newobj0 = new stdClass();

                 $newobj0->t1=$t1;
                 $newobj0->t2=$t2;
                 $newobj0->t3=$t3;
                 $newobj0->t4=$t4;
                 $newobj0->t5=$t5;
                 $newobj0->t6=$t6;
                 $newobj0->t7=$t7;
                 $newobj0->t8=$t8;
                 $newobj0->t9=$t9;
                 $newobj0->t10=$t10;
                 $newobj0->t11=$t11;
                 $newobj0->t12=$t12;
                 $newobj0->t13=$t13;
                 $newobj0->t14=$t14;
                 $newobj0->t15=$t15;
                 $newobj0->t16=$t16;
                 $newobj0->t17=$t17;
                 $newobj0->t18=$t18;
                 $newobj0->t19=$t19;
                 $newobj0->t20=$t20;
                 $newobj0->t21=$t21;
                 $newobj0->t22=$t22;
                 $newobj0->t23=$t23;
                 $newobj0->t24=$t24;
                 $newobj0->t25=$t25;
                 $newobj0->t26=$t26;
                 $newobj0->t27=$t27;
                 $newobj0->t28=$t28;
                 $newobj0->t29=$t29;
                 $newobj0->t30=$t30;
                 $newobj0->t31=$t31;


            foreach ($consulta1 as $key => $dato) {

                $cont=0;
                $conTar=0;


                $diafin=date("d", mktime(0,0,0, $mes+1, 0, $anio));
                $sum=0;
                $totalhoras=0;

                $d1="";
                $d2="";
                $d3="";
                $d4="";
                $d5="";
                $d6="";
                $d7="";
                $d8="";
                $d9="";
                $d10="";
                $d11="";
                $d12="";
                $d13="";
                $d14="";
                $d15="";
                $d16="";
                $d17="";
                $d18="";
                $d19="";
                $d20="";
                $d21="";
                $d22="";
                $d23="";
                $d24="";
                $d25="";
                $d26="";
                $d27="";
                $d28="";
                $d29="";
                $d30="";
                $d31="";





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

select ifnull(if(a.tipo=1,'A',IF(a.tipo=0,'I',IF(a.tipo=3,'J',IF(a.tipo=4,'F',IF(a.tipo=5,'L',IF(a.tipo=6,'P',IF(a.tipo=7,'H',IF(a.tipo=2,'T',IF(a.tipo=8,'TP',null))))))))),'') as asistencia,
c.activo as diaactivo
                                from personals p
                                left join configdias c on c.personal_id=p.id and c.tipodia_id='".$tipodia."'
                                left join asistenciapersonals a on a.personal_id=p.id and a.fecha='".$fecha."'
                                where p.hefectivas='1' and p.id='".$dato->idPersonal."';");

                                foreach ($consulta2 as $key2 => $repA) {
                                    $cont++;
                                    $sum=$sum+intval($repA->asistencia);

                                    if(strval($repA->asistencia)!="F")
                                    {
                                        if(intval($dato->nivel)==1){

                                        $totalhoras=$totalhoras+5;

                                    }elseif(intval($dato->nivel)==2){

                                        $totalhoras=$totalhoras+6;
                                        
                                    }elseif(intval($dato->nivel)==3){

                                        $totalhoras=$totalhoras+7;
                                        
                                    }
                                    }


                                    if($repA->asistencia=="F"){
                                        $repA->asistencia="";
                                    }


                                    if($repA->asistencia=="T"){
                                        $conTar++;
                                    }

                                    if($conTar==3){
                                        $repA->asistencia="3T";
                                        $conTar=0;
                                    }


                                    if($repA->asistencia=="" && $repA->diaactivo=="1" && $date<= $hoy){
                                        $repA->asistencia="I";
                                    }

                                    

                                    if($cont2==1){

                                        $d1=$repA->asistencia;
                                    

                                    }elseif($cont2==2){
                                        $d2=$repA->asistencia;
                    
                                    }elseif($cont2==3){
                                        $d3=$repA->asistencia;
                                    }elseif($cont2==4){
                                        $d4=$repA->asistencia;
                                    }elseif($cont2==5){
                                        $d5=$repA->asistencia;
                                    }elseif($cont2==6){
                                        $d6=$repA->asistencia;
                                    }elseif($cont2==7){
                                        $d7=$repA->asistencia;
                                    }elseif($cont2==8){
                                        $d8=$repA->asistencia;
                                    }elseif($cont2==9){
                                        $d9=$repA->asistencia;
                                    }elseif($cont2==10){
                                        $d10=$repA->asistencia; 
                                    }elseif($cont2==11){
                                        $d11=$repA->asistencia; 
                                    }elseif($cont2==12){
                                        $d12=$repA->asistencia; 
                                    }elseif($cont2==13){
                                        $d13=$repA->asistencia; 
                                    }elseif($cont2==14){
                                        $d14=$repA->asistencia; 
                                    }elseif($cont2==15){
                                        $d15=$repA->asistencia; 
                                    }elseif($cont2==16){
                                        $d16=$repA->asistencia; 
                                    }elseif($cont2==17){
                                        $d17=$repA->asistencia; 
                                    }elseif($cont2==18){
                                        $d18=$repA->asistencia; 
                                    }elseif($cont2==19){
                                        $d19=$repA->asistencia; 
                                    }elseif($cont2==20){
                                        $d20=$repA->asistencia; 
                                    }elseif($cont2==21){
                                        $d21=$repA->asistencia; 
                                    }elseif($cont2==22){
                                        $d22=$repA->asistencia; 
                                    }elseif($cont2==23){
                                        $d23=$repA->asistencia; 
                                    }elseif($cont2==24){
                                        $d24=$repA->asistencia; 
                                    }elseif($cont2==25){
                                        $d25=$repA->asistencia; 
                                    }elseif($cont2==26){
                                        $d26=$repA->asistencia; 
                                    }elseif($cont2==27){
                                        $d27=$repA->asistencia; 
                                    }elseif($cont2==28){
                                        $d28=$repA->asistencia; 
                                    }elseif($cont2==29){
                                        $d29=$repA->asistencia; 
                                    }elseif($cont2==30){
                                        $d30=$repA->asistencia; 
                                    }elseif($cont2==31){
                                        $d31=$repA->asistencia; 
                                    }
                                    $cont2++;
                                }


                            }

                        }
                    }

                

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
                 $newobj->d8=$d8;
                 $newobj->d9=$d9;
                 $newobj->d10=$d10;
                 $newobj->d11=$d11;
                 $newobj->d12=$d12;
                 $newobj->d13=$d13;
                 $newobj->d14=$d14;
                 $newobj->d15=$d15;
                 $newobj->d16=$d16;
                 $newobj->d17=$d17;
                 $newobj->d18=$d18;
                 $newobj->d19=$d19;
                 $newobj->d20=$d20;
                 $newobj->d21=$d21;
                 $newobj->d22=$d22;
                 $newobj->d23=$d23;
                 $newobj->d24=$d24;
                 $newobj->d25=$d25;
                 $newobj->d26=$d26;
                 $newobj->d27=$d27;
                 $newobj->d28=$d28;
                 $newobj->d29=$d29;
                 $newobj->d30=$d30;
                 $newobj->d31=$d31;



                 $newobj->sum=$sum;
                 $newobj->cont=$cont;

                 $newobj->totalhoras=$totalhoras;

                 $reporte[]=$newobj;
                
            }




            $result='1';
    $msj='Datos Consultados';


            return [

            'reporte'=>$reporte,
            'result'=>$result,
            'msj'=>$msj,
            'diasMes'=>$diasMes,
            'newobj0'=>$newobj0,
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
