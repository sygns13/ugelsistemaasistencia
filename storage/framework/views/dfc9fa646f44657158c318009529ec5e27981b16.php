<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes de Asistencia de Personal - Anexo 03</h3>
              <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</a>
            </div>

              <div class="box-body">
                <div class="form-group">


                  <div class="col-md-12">
                    <h5>Filtros de Búsqueda</h5>
                  </div>


<div class="col-md-12" style="padding-top: 10px;">



                   
                   <div class="form-group">

                           <label for="cbuAnio" class="col-sm-1 control-label">Año:*</label>
                    <div class="col-sm-3">
<select class="form-control input-xs" id="cbuAnio" name="cbuAnio" v-model="anio" >
  <option value="2010">2010</option>
                          <option value="2011">2011</option>
                          <option value="2012">2012</option>
                          <option value="2013">2013</option>
                          <option value="2014">2014</option>
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
            </select>


                   </div>

                    <label for="cbuMes" class="col-sm-1 control-label">Mes:*</label>
                    <div class="col-sm-3">
                               <select class="form-control input-xs" id="cbuMes" name="cbuMes" v-model="mes" >

              <option value="1">ENERO</option>
              <option value="2">FEBRERO</option>
              <option value="3">MARZO</option>
              <option value="4">ABRIL</option>
              <option value="5">MAYO</option>
              <option value="6">JUNIO</option>
              <option value="7">JULIO</option>
              <option value="8">AGOSTO</option>
              <option value="9">SETIEMBRE</option>
              <option value="10">OCTUBRE</option>
              <option value="11">NOVIEMBRE</option>
              <option value="12">DICIEMBRE</option>
            </select>


                   </div>




                   </div>
                   </div>

                  <div class="col-md-12" style="padding-top: 15px;">
                    

                <div class="form-group">
                  <label for="cbuIE" class="col-sm-1 control-label">Institución:*</label>

                  <div class="col-sm-7">
                  <select class="form-control" id="cbuIE" name="cbuIE">

                    <option value='' disabled>Seleccione...</option>

                    <template v-for="institucion, key in institucions">

                        <option v-bind:value="institucion.id" v-if="institucion.tipo==2">{{ institucion.nombre }} - Código Modular: {{ institucion.codigomod }}</option>

                        <input type="hidden" name="txtModalidad" v-bind:id="'txtmod'+institucion.id" v-bind:value="institucion.modalidad">
                        <input type="hidden" name="txtnivel" v-bind:id="'txtnivel'+institucion.id" v-bind:value="institucion.nivel">
                        <input type="hidden" name="txtturno" v-bind:id="'txtturno'+institucion.id" v-bind:value="institucion.turno">
                    </template>
                    
                  </select>
                   </div>
                </div>
     
           
                 

                  </div>
                  </div>






<div  class="col-md-12" style="padding-top: 30px;">
  
   <div class="form-group" >

    <button type="button" class="btn btn-info" id="btnImprimirPlantilla" @click.prevent="buscarInfo()"><i class="fa fa-search" aria-hidden="true" ></i> Buscar Datos</button>

              <button type="button" class="btn btn-success" id="btnImprimirPlantilla" @click.prevent="imprimirPlantilla()"><i class="fa fa-print" aria-hidden="true" ></i> Imprimir</button>

                    <div class="sk-three-bounce" v-show="divloaderNuevo">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
      </div>

              
                </div>

</div>


                </div>
          </div>

          </div>













<center>
           <div style=" height: auto; background-color: white;"  class="col-md-12">

            <div><table style="width:100%;height: 2cm;"><tr><td></td></tr></table></div>
  <div style="padding-top: 0cm;padding-left: 1cm; padding-right: 0.7cm;" id="divImp">
   
   <div id="tituloR"><center><b>ANEXO 03
      <br>
      FORMATO 01: REPORTE DE ASISTENCIA DETALLADO
    </b></center>

    </div>


    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px; padding:5px; width:50%">
           <b>DRE/UGEL: ANCAHS - UGEL {{ ugel }}</b>
          </td>

          <td style="font-size: 12px; padding:5px;">
          <b>  PERIODO(mes/año): {{ letrasMes(mes) }} de {{ anio }} </b>
          </td>

        </tr>
        
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px; padding:5px;width:50%">
            <b>I.E.: {{ nombreIE }} </b>
          </td>

          <td style="font-size: 12px; padding:5px;">
           <b> TURNO: {{ turno }}</b>
          </td>



        </tr>
        
      </table>
    </div>

        <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px; padding:5px;">
          <b>Nivel/Modalidad Educativa: {{ nivelIE }} - {{ modalidadIE }}</b>
          </td>

          
          
        </tr>

        
      </table>
    </div>


         <div style="padding-top: 20px;padding-left: 0px;    margin-right: 0px;" class="box-body table-responsive" >
      <table style=" width: 100%; text-align: center;align-content: center;" class="table table-hover table-bordered" >
        <tr>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;" rowspan="3">N°</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 9%;" rowspan="3">DNI</th>
          <th style=" font-size: 12px;  padding:5px; width: 16%;" rowspan="3">Apellidos y Nombres</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 6%;  writing-mode: vertical-lr;" rowspan="3">Cargo</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 7%;  writing-mode: vertical-lr;" rowspan="3">Condición</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 6%;  writing-mode: vertical-lr;" rowspan="3">Jornada Laboral</th>

          <th v-if="parseInt(diasMes)==28" style=" font-size: 12px; text-align:center; padding:5px; width: 52%;" colspan="28">DÍAS CALENDARIO</th>
          <th v-if="parseInt(diasMes)==29" style=" font-size: 12px; text-align:center; padding:5px; width: 52%;" colspan="29">DÍAS CALENDARIO</th>
          <th v-if="parseInt(diasMes)==30" style=" font-size: 12px; text-align:center; padding:5px; width: 52%;" colspan="30">DÍAS CALENDARIO</th>
          <th v-if="parseInt(diasMes)==31" style=" font-size: 12px; text-align:center; padding:5px; width: 52%;" colspan="31">DÍAS CALENDARIO</th>
        </tr>


        <tr>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">1</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">2</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">3</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">4</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">5</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">6</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">7</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">8</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">9</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">10</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">11</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">12</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">13</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">14</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">15</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">16</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">17</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">18</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">19</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">20</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">21</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">22</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">23</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">24</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">25</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">26</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">27</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">28</th>

          <template v-if="parseInt(diasMes)==29">

             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">29</th>
            
          </template>

          <template v-if="parseInt(diasMes)==30">
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">29</th>
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">30</th>
          </template>

          <template v-if="parseInt(diasMes)==31">
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">29</th>
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">30</th>            
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">31</th>            
          </template>

        </tr>

                <tr>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t1}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t2}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t3}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t4}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t5}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t6}}</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t7}}</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t8}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t9}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t10}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t11}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t12}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t13}}</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t14}}</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t15}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t16}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t17}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t18}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t19}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t20}}</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t21}}</th> 
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t22}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t23}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t24}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t25}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t26}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t27}}</th>
          <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t28}}</th>

          <template v-if="parseInt(diasMes)==29">

             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t29}}</th>
            
          </template>

          <template v-if="parseInt(diasMes)==30">
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t29}}</th>
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t30}}</th>
          </template>

          <template v-if="parseInt(diasMes)==31">
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t29}}</th>
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t30}}</th>            
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{newobj0.t31}}</th>            
          </template>

        </tr>



         <tr v-for="rep, key in reporte" >
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{key+1}}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.dni }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.apellidos }} {{ rep.nombres }}</td>
                          <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.cargo }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.ley }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.jornada_lab }}</td>
          
   

                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d1 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d2 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d3 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d4 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d5 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d6 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d7 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d8 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d9 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d10 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d11 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d12 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d13 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d14 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d15 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d16 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d17 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d18 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d19 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d20 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d21 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d22 }}</td>               
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d23 }}</td>               
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d24 }}</td>               
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d25 }}</td>               
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d26 }}</td>               
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d27 }}</td>               
                  <td style="font-size: 11px; text-align:center; padding: 1px;">{{ rep.d28 }}</td>   

                  <template v-if="parseInt(diasMes)==29">

             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{ rep.d29 }}</th>
            
          </template>

          <template v-if="parseInt(diasMes)==30">
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{ rep.d29 }}</th>
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{ rep.d30 }}</th>
          </template>

          <template v-if="parseInt(diasMes)==31">
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{ rep.d29 }}</th>
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{ rep.d30 }}</th>            
             <th style=" font-size: 12px; text-align:center; padding:2px; width: 2%;">{{ rep.d31 }}</th>            
          </template>            
                 
                  


                </tr>
        
      </table>
      </div>







     <div style="padding-top: 1cm;">
      <table style="border: 0px solid gray; width: 100%; ">
        <tr>
          <td style="font-size: 11px; width:50%">
          .............................
          </td>

          <td style="font-size: 11px; width:50%">
          Lugar y Fecha: ......................... {{ diahoy }}
          </td>
        </tr>
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:50%;padding-left: 25px;">
          Director
          </td>

          <td style="font-size: 11px; width:50%">
          
          </td>
        </tr>
      </table>
    </div>




       <div>
    
    </div>


      <div>
      <table style="border: 0px solid gray; width: 40%;    margin-top: 20px; float: left!important;    font-size: 11px;">
        <tr>
          <td style="font-size: 11px;" colspan="2">
          <b>LEYENDA</b>
          </td>
        </tr>


        <tr>
          <td style="border: 1px solid gray;">A</td>
          <td style="border: 1px solid gray;">Día Laborado</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">I</td>
          <td style="border: 1px solid gray;">Inasistencia Injustificada</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">3T</td>
          <td style="border: 1px solid gray;">Tercera tardanza, considerada como una Inasistencia Injustificada</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">J</td>
          <td style="border: 1px solid gray;">Inasistencia Justificada (Licencia, Permiso, vacaciones)</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">L</td>
          <td style="border: 1px solid gray;">Licencia sin goce de remuneraciones</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">P</td>
          <td style="border: 1px solid gray;">Permiso sin goce de remuneraciones</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">T</td>
          <td style="border: 1px solid gray;">Tardanza</td>
        </tr>

        <tr>
          <td style="border: 1px solid gray;">H</td>
          <td style="border: 1px solid gray;">Huelga o Paro</td>
        </tr>

      </table>
    </div>

   







        </div>
  </div>
</center>

      
