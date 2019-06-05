<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes de Asistencia de Personal - FORMATO 02</h3>
              <a style="float: right;" type="button" class="btn btn-default" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
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

                        <option v-bind:value="institucion.id" v-if="institucion.tipo==2">@{{ institucion.nombre }} - Código Modular: @{{ institucion.codigomod }}</option>

                        <input type="hidden" name="txtModalidad" v-bind:id="'txtmod'+institucion.id" v-bind:value="institucion.modalidad">
                        <input type="hidden" name="txtnivel" v-bind:id="'txtnivel'+institucion.id" v-bind:value="institucion.nivel">
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
   
   <div id="tituloR"><center><b>FORMATO 02
      <br>
      INFORME DE LAS HORAS EFECTIVAS DE TRABAJO PEDAGOGICO EN LAS INSTITUCIONES EDUCATIVAS <br>
PUBLICAS
    </b></center>

    </div>


    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px;">
           <b>UNIDAD DE GESTIÓN EDUCATIVA LOCAL: @{{ ugel }}</b>
          </td>
        </tr>
        
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px;">
            <b>INSTITUCIÓN EDUCATIVA: @{{ nombreIE }} </b>
          </td>
        </tr>
        
      </table>
    </div>

        <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px;">
          <b>  NIVEL EDUCATIVO: @{{ nivelIE }} </b>
          </td>

          <td style="font-size: 12px;">
           <b> MODALIDAD: @{{ modalidadIE }} </b>
          </td>

          <td style="font-size: 12px;">
          <b>  MES: @{{ letrasMes(mes) }} </b>
          </td>
        </tr>

        
      </table>
    </div>


         <div style="padding-top: 20px;padding-left: 0px;    margin-right: 0px;" class="box-body table-responsive" >
      <table style=" width: 100%; text-align: center;align-content: center;" class="table table-hover table-bordered" >
        <tr>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;" rowspan="3">N°</th>
          <th style=" font-size: 12px;  padding:5px; width: 16%;" rowspan="3">Apellidos y Nombres</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 6%;  writing-mode: vertical-lr;" rowspan="3">Jornada Laboral</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 6%;  writing-mode: vertical-lr;" rowspan="3">Grado</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 7%;  writing-mode: vertical-lr;" rowspan="3">Sección</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 9%;  writing-mode: vertical-lr;" rowspan="3">(*) Nº Horas Programadas efectivas a dictar </th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 52%;" colspan="23">HORAS EFECTIVAS DE TRABAJO ESCOLAR - MES</th>
        </tr>

        <tr>

          <th style=" font-size: 12px; text-align:center; padding:5px; width: 44%;" colspan="22">DIAS EFECTIVOS DE TRABAJO ESCOLAR </th>
        <th style=" font-size: 12px; text-align:center; padding:5px; width: 8%;" rowspan="2" >TOTAL DE HORAS EFECTIVAS MENSUAL</th>
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
        </tr>


         <tr v-for="rep, key in reporte" >
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{key+1}}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.apellidos }} @{{ rep.nombres }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.jornada_lab }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.gradorep }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.seccionrep }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.totalhoras }}</td>

                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d1 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d2 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d3 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d4 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d5 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d6 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d7 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d8 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d9 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d10 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d11 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d12 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d13 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d14 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d15 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d16 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d17 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d18 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d19 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d20 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d21 }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.d22 }}</td>     

                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.sum }}</td>            
                 
                  


                </tr>
        
      </table>
      </div>


       <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px;">
          (*) No se Considera los días feriado
          </td>
        </tr>
      </table>
    </div>


      <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:60%">
          <b>LEYENDA</b>
          </td>


        </tr>
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:60%">
          <b>J = Falta Justificada </b>
          </td>

          <td style="font-size: 11px; width:40%">
          <b>Nivel Inicial = 1 día = 5 horas</b>
          </td>

          
        </tr>
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:60%">
          <b>I = Falta Injustificada </b>
          </td>

          <td style="font-size: 11px; width:40%">
          <b>Nivel Primaria = 1 día = 6 horas</b>
          </td>


        </tr>
      </table>
    </div>

        <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:60%">
          <b>F = Día Feriado </b>
          </td>

          <td style="font-size: 11px; width:40%">
          <b>Nivel Secundaria = 1 día = 7 horas s</b>
          </td>

          
        </tr>
      </table>
    </div>




     <div style="padding-top: 1cm;">
      <table style="border: 0px solid gray; width: 100%; ">
        <tr>
          <td style="font-size: 11px; width:50%">
          ....................................................................
          </td>

          <td style="font-size: 11px; width:50%">
          ....................................................................................................................
          </td>
        </tr>
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:50%">
          DIRECTOR DE INSTITUCION EDUCTIVA
          </td>

          <td style="font-size: 11px; width:50%">
          VºBº REPRESENTANTE DEL CONSEJO EDUCATIVO INSTITUCIONAL 
          </td>
        </tr>
      </table>
    </div>








        </div>
  </div>
</center>

      
