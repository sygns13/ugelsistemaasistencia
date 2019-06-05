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

class repHorasEfectivasController2 extends Controller
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
            $modulo="repHorasEfectivas2";

             // $fecharep=date("d/m/Y");
             // $fecha=date("Y-m-d");

            $anio=date("Y");
            $mes=intval(date("m"));



            return view('rephorasefectivas2.index',compact('modulo','imagenPerfil','tipouser','fecharep','anio','mes'));

        }
            else
        {
            return view('adminlte::home');           
        }
    }


    public function index()
    {
        //
    }


     public function buscar1(Request $request)
        {
            $idInsti=$request->idInsti;
            $anio=$request->anio;
            $mes=$request->mes;


            $reporte = array();

            $consulta1=DB::select("select i.id as idInsti, p.id as idPersonal, pe.doc as dni, pe.nombres, pe.apellidos, p.jornada_lab, p.gradorep, p.seccionrep, p.especialidad, n.nivel
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

            


            foreach ($consulta1 as $key => $dato) {

                $cont=0;


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

                $cont2=1;

                for ($i=1; $i <=$diafin ; $i++) { 

                    

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

                            if($tipodia>0 && $tipodia<6){

                                $consulta2=DB::select("select ifnull(if(a.tipo=1,a.horas,IF(a.tipo=0,'I',IF(a.tipo=3,'J',IF(a.tipo=4,'F',if(a.tipo=2,a.horas,null))))),'I') as asistencia
                                from personals p
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
