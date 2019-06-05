<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes de Asistencia de Personal - FORMATO 01</h3>
              <a style="float: right;" type="button" class="btn btn-default" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
          Volver</a>
            </div>

              <div class="box-body">
                <div class="form-group">


                  <div class="col-md-12">
                    <h5>Filtros de Búsqueda</h5>
                  </div>


                  <div class="col-md-12">
                    
                                        <div class="form-group">
                  <label for="vbuFe" class="col-sm-1 control-label">Fecha:*</label>

                    <div class="col-sm-3">
                    <input type="date" class="form-control" id="txtfecha" name="txtfecha" placeholder="dd/mm/aaaa" maxlength="10"  v-model="fecha">
                </div>


            

    
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
   
   <div id="tituloR"><center><b>FORMATO 01
      <br>
      INFORME DE LAS HORAS EFECTIVAS DE TRABAJO PEDAGOGICO EN LAS INSTITUCIONES EDUCATIVAS <br>
PUBLICAS POR DIA 
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
          <b>  MES: @{{ pasfechaVista(fecha) }} </b>
          </td>
        </tr>

        
      </table>
    </div>


         <div style="padding-top: 20px;padding-left: 0px;    margin-right: 0px;" class="box-body table-responsive" >
      <table style=" width: 100%; text-align: center;align-content: center;" class="table table-hover table-bordered" >
        <tr>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;" rowspan="3">N°</th>
          <th style=" font-size: 12px;  padding:5px; width: 25%;" rowspan="3">Apellidos y Nombres</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 6%;  writing-mode: vertical-lr;" rowspan="3">Jornada Laboral</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 6%;  writing-mode: vertical-lr;" rowspan="3">Grado</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 7%;  writing-mode: vertical-lr;" rowspan="3">Sección</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 16%;  writing-mode: vertical-lr;" rowspan="3">Especialidad</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 37%;" colspan="8">HORAS EFECTIVAS DE TRABAJO ESCOLAR - DÍA</th>
        </tr>

        <tr>

          <th style=" font-size: 12px; text-align:center; padding:5px; width: 28%;" colspan="7">HORAS</th>
        <th style=" font-size: 12px; text-align:center; padding:5px; width: 8%;" rowspan="2" >TOTAL HORAS EFECTIVAS </th>
        </tr>

        <tr>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">1</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">2</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">3</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">4</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">5</th>
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">6</th> 
          <th style=" font-size: 12px; text-align:center; padding:5px; width: 4%;">7</th> 
        </tr>


         <tr v-for="rep, key in reporte" >
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{key+1}}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.apellidos }} @{{ rep.nombres }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.jornada_lab }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.gradorep }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.seccionrep }}</td>
                  <td style="font-size: 11px; text-align:center; padding: 1px;">@{{ rep.especialidad }}</td>
                  
                  <template v-if="String(rep.asistencia)=='I'">
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">I</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">0</td>
                  </template>

                  <template v-if="String(rep.asistencia)=='J'">
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">J</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">0</td>
                  </template>

                  <template v-if="String(rep.asistencia)=='F'">
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">F</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">0</td>
                  </template>

                  <template v-if="parseInt(rep.asistencia)==1">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">1</td>

                    </template>

                    <template v-if="parseInt(rep.asistencia)==2">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">2</td>

                    </template>

                    <template v-if="parseInt(rep.asistencia)==3">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">3</td>

                    </template>

                    <template v-if="parseInt(rep.asistencia)==4">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">4</td>

                    </template>

                    <template v-if="parseInt(rep.asistencia)==5">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">5</td>

                    </template>

                    <template v-if="parseInt(rep.asistencia)==6">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">---</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">6</td>

                    </template>

                    <template v-if="parseInt(rep.asistencia)==7">

                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">X</td>
                    <td style="font-size: 11px; text-align:center; padding: 1px;">7</td>

                    </template>
                  


                </tr>
        
      </table>
      </div>


      <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:60%">
          <b>LEYENDA</b>
          </td>

          <td style="font-size: 11px; width:40%">
          <b>Nivel Inicial = 1 día = 5 horas </b>
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
          <b>Nivel Primaria = 1 día = 6 horas</b>
          </td>
        </tr>
      </table>
    </div>

    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px; width:60%">
          <b>I = Falta injustificada</b>
          </td>

          <td style="font-size: 11px; width:40%">
          <b>Nivel Secundaria = 1 día = 7 horas s</b>
          </td>
        </tr>
      </table>
    </div>


    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 11px;">
          <b>X = Hora laborada </b>
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

      
