<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes de Asistencia de Alumnos</h3>
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
                    <select id="vbuFe" class="form-control"  v-model="cbufecha">
                <option value="0">Hoy: {{$fecha}}</option>
                <option value="1">Mes: {{nombremes($mesActual)}} de {{$yearActual}}</option>
            {{--  <option value="2">Año: {{$yearActual}}</option>
                <option value="3">Siempre</option>--}}    
                <option value="4">Rango de Fecha</option>
                
                </select>

                <div id="divfec" v-if="cbufecha==4">
                    
                   <br>
                <div style="display: inline-block">
                
                Desde:
                 <input type="date" class="form-control" id="txtfecha" name="txtfecha" placeholder="dd/mm/aaaa" maxlength="10"  v-model="fechaini">

                Hasta:
                 <input type="date" class="form-control" id="txtfecha" name="txtfecha" placeholder="dd/mm/aaaa" maxlength="10"  v-model="fechafin">
                    
                </div>
            </div>
                </div>


            

    
                <div class="form-group">
                  <label for="cbuIE" class="col-sm-1 control-label">Institución:*</label>

                  <div class="col-sm-7">
                  <select class="form-control" id="cbuIE" name="cbuIE" >
                    <option value="0">Reporte General</option>
                    <template v-for="institucion, key in institucions">
                        <option v-bind:value="institucion.id" v-if="institucion.tipo==1">@{{ institucion.nombre }} </option>
                        <option v-bind:value="institucion.id" v-if="institucion.tipo==2">@{{ institucion.nombre }} - Código Modular: @{{ institucion.codigomod }}</option>
                        <input type="hidden" name="txtnivel" v-bind:id="'txtnivel'+institucion.id" v-bind:value="institucion.nivel">
                    </template>
                    
                  </select>
                   </div>
                </div>
     
           
                 

                  </div>
                  </div>


<div class="col-md-12" style="padding-top: 30px;" v-if="selectInsti">
  


                    <div class="form-group">
                  <label for="cbuGrados" class="col-sm-1 control-label">Nivel de Detalle:*</label>

                  <div class="col-sm-5">
                  <select class="form-control" id="cbuGrados" name="cbuGrados" >
                    <option value="0">Reporte General por Institución Educativa</option>
                   {{--   <template v-for="grado, key in grados">
                       <option v-bind:value="grado.id">@{{ grado.nombre }} </option> 
                    </template>--}}
                    <option value="1">Reporte Detallado por Grados y Secciones</option>
                  </select>
                   </div>
{{--  
<div v-if="selectSeccion">
                  <label for="cbuSecciones" class="col-sm-1 control-label">Secciones:*</label>

                  <div class="col-sm-5">
                  <select class="form-control" id="cbuSecciones" name="cbuSecciones" >
                    <option value="0">Reporte General</option>
                    <template v-for="seccion, key in seccions">
                        <option v-bind:value="seccion.id">@{{ seccion.nombre }} </option>
                    </template>
                    
                  </select>
                   </div>
                   </div>--}}
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
           <div style="width: 21cm; height: auto; background-color: white;" id="divImp">
  <div style="padding-top: 1.5cm;padding-left: 1cm; padding-right: 0.7cm;">
    <center><b>Reporte de Asistencia Alumnos</b></center>


    <div>
      <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px;" v-if="cbufecha==0">
            Fecha: @{{ cabehoy }}
          </td>
          <td style="font-size: 12px;" v-if="cbufecha==1">
            Fecha: @{{ cabemes }}
          </td>
          <td style="font-size: 12px;" v-if="cbufecha==2">
            Fecha: @{{ cabeyear }}
          </td>
          <td style="font-size: 12px;" v-if="cbufecha==3">
            Fecha: @{{cabesiempre }}
          </td>
          <td style="font-size: 12px;" v-if="cbufecha==4">
            Rango de Fecha Desde el: @{{ pasfechaVista(fechaini) }} Hasta el: @{{ pasfechaVista(fechafin) }}
          </td>
        </tr>
        
      </table>
    </div>

    <div>
            <table style="border: 0px solid gray; width: 100%;">
        <tr>
          <td style="font-size: 12px;" v-if="cbuIE==0">
            Reporte General de Instituciones Educativas
          </td>
          <td style="font-size: 12px;" v-if="cbuIE>0">
            Institución Educativa: @{{ nombreIE }}<br>
            Nivel: @{{ nivel }}
          </td>
       
        </tr>
        
      </table>
    </div>

    <div>
            <table style="border: 0px solid gray; width: 100%;">
        <tr>

          <td style="font-size: 12px;" v-if="cbuIE>0 && cbuGrados==0">
            Reporte General por Institución Educativa
          </td>
       
        </tr>
        
      </table>
    </div>

        <div>
            <table style="border: 0px solid gray; width: 100%;">
        <tr>

          <td style="font-size: 12px;" v-if="cbuIE>0 && cbuGrados>0">
            Reporte Detallado por Grados y Secciones
          </td>
       
        </tr>
        
      </table>
    </div>


{{--  
     <div>
            <table style="border: 0px solid gray; width: 100%;">
        <tr>

          <td style="font-size: 12px;" v-if="cbuGrados>0">
            Grado: @{{ grado }}
          </td>
       
        </tr>
        
      </table>
    </div>


 <div>
            <table style="border: 0px solid gray; width: 100%;">
        <tr>

          <td style="font-size: 12px;" v-if="cbuSeccion>0">
            Sección: @{{ seccion }}
          </td>
       
        </tr>
        
      </table>
    </div>

--}}





 <div style="padding-top: 20px;" v-if="cbuIE==0" class="box-body table-responsive">
      <table style=" width: 100%;" class="table table-hover table-bordered">
        <tr>
          <th style=" font-size: 12px; width: 4%;">N°</th>
          <th style=" font-size: 12px; width: 26%;">Institución</th>
          <th style=" font-size: 12px; width: 10%;">Código Modular</th>
          <th style=" font-size: 12px; width: 20%;">Nivel</th>
          <th style=" font-size: 12px; width: 10%;">Asistencias programadas</th>
          <th style=" font-size: 12px; width: 10%;">Asistencias Realizadas</th>
          <th style=" font-size: 12px; width: 10%;">Faltas de Alumnos</th>
          <th style=" font-size: 12px; width: 10%;">% de Asistencia</th>
        </tr>


         <tr v-for="rep, key in reporte" >
                  <td style="font-size: 12px; padding: 5px;">@{{key+1}}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.nombre }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.codigomod }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.nivel }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.asistProgramadas }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.asistRealizadas }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.Faltas }}</td>

                  <template v-if="parseFloat(rep.Porcentaje)>=95">
                  <td style="font-size: 12px; padding: 5px; background: green!important;;">@{{ rep.Porcentaje }}</td>
                </template>

                <template v-if="parseFloat(rep.Porcentaje)>=90 && parseFloat(rep.Porcentaje)<95">
                  <td style="font-size: 12px; padding: 5px; background: orange!important;;">@{{ rep.Porcentaje }}</td>
                </template>

                <template v-if="parseFloat(rep.Porcentaje)>=0 && parseFloat(rep.Porcentaje)<90">
                  <td style="font-size: 12px; padding: 5px; background: red!important;;">@{{ rep.Porcentaje }}</td>
                </template>


                </tr>
        
      </table>
      </div>



       <div style="padding-top: 20px;" v-if="cbuIE>0 && cbuGrados==0" class="box-body table-responsive">
      <table style=" width: 100%;" class="table table-hover table-bordered">
        <tr>

          <th style=" font-size: 12px; width: 5%;">N°</th>
          <th style=" font-size: 12px; width: 17%;">Fecha</th>
          <th style=" font-size: 12px; width: 17%;">Feriado</th>
          <th style=" font-size: 12px; width: 17%;">Asistencias programadas</th>
          <th style=" font-size: 12px; width: 17%;">Asistencias Realizadas</th>
          <th style=" font-size: 12px; width: 17%;">Faltas de Alumnos</th>
          <th style=" font-size: 12px; width: 10%;">% de Asistencia</th>
        </tr>


         <tr v-for="rep, key in reporte2" >
                  <td style="font-size: 12px; padding: 5px;">@{{key+1}}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.fecha }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.feriado }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.asistProgramadas }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.asistRealizadas }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.Faltas }}</td>

                  <template v-if="parseFloat(rep.Porcentaje)>=98">
                  <td style="font-size: 12px; padding: 5px; background: green!important;;">@{{ rep.Porcentaje }}</td>
                </template>

                <template v-if="parseFloat(rep.Porcentaje)>=90 && parseFloat(rep.Porcentaje)<98">
                  <td style="font-size: 12px; padding: 5px; background: orange!important;;">@{{ rep.Porcentaje }}</td>
                </template>

                <template v-if="parseFloat(rep.Porcentaje)>=0 && parseFloat(rep.Porcentaje)<90">
                  <td style="font-size: 12px; padding: 5px; background: red!important;;">@{{ rep.Porcentaje }}</td>
                </template>


                </tr>
        

      </table>
      </div>




      <div style="padding-top: 20px;" v-if="cbuIE>0 && cbuGrados>0" class="box-body table-responsive">
      <table style=" width: 100%;" class="table table-hover table-bordered">
        <tr>
          <th style=" font-size: 12px; width: 4%;">N°</th>
          <th style=" font-size: 12px; width: 20%;">Grado</th>
          <th style=" font-size: 12px; width: 20%;">Sección</th>
          <th style=" font-size: 12px; width: 14%;">Asistencias programadas</th>
          <th style=" font-size: 12px; width: 14%;">Asistencias Realizadas</th>
          <th style=" font-size: 12px; width: 14%;">Faltas de Alumnos</th>
          <th style=" font-size: 12px; width: 14%;">% de Asistencia</th>
        </tr>


         <tr v-for="rep, key in reporte3" >
                  <td style="font-size: 12px; padding: 5px;">@{{key+1}}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.grado }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.seccion }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.asistProgramadas }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.asistRealizadas }}</td>
                  <td style="font-size: 12px; padding: 5px;">@{{ rep.Faltas }}</td>

                  <template v-if="parseFloat(rep.Porcentaje)>=95">
                  <td style="font-size: 12px; padding: 5px; background: green!important;;">@{{ rep.Porcentaje }}</td>
                </template>

                <template v-if="parseFloat(rep.Porcentaje)>=90 && parseFloat(rep.Porcentaje)<95">
                  <td style="font-size: 12px; padding: 5px; background: orange!important;;">@{{ rep.Porcentaje }}</td>
                </template>

                <template v-if="parseFloat(rep.Porcentaje)>=0 && parseFloat(rep.Porcentaje)<90">
                  <td style="font-size: 12px; padding: 5px; background: red!important;;">@{{ rep.Porcentaje }}</td>
                </template>


                </tr>
        
      </table>
      </div>





        </div>
  </div>
</center>

      
