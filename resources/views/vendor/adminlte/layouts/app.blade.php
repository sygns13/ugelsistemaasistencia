<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-purple sidebar-mini ">

<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

   {{--   @include('adminlte::layouts.partials.controlsidebar')--}}

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>
<script type="text/javascript">
    function bajar1(){
        //alert("prueba");
        $("#menuBajar1").toggle();
    }

</script>

    @if(!isset ($modulo))
        @include('inicio.vue')
    @else

    @if($modulo=="asistenciaalumnos")
        @include('asistenciaalumnos.vue')

    @elseif($modulo=="mainUgel")
        @include('ugel.vue')

    @elseif($modulo=="colegios")
        @include('colegios.vue')    

    @elseif($modulo=="mainTurnos")
        @include('turnos.vue')    

    @elseif($modulo=="usuarios")
        @include('usuarios.vue')

    @elseif($modulo=="personal")
        @include('personals.vue')

    @elseif($modulo=="asistenciapersonal")
        @include('asistenciapersonal.vue')    

    @elseif($modulo=="feriado")
        @include('feriados.vue')    

    @elseif($modulo=="repAsistenciaAlumnos")
        @include('reporteAlumnos.vue')

    @elseif($modulo=="repAsistenciaPersonal")
        @include('reportePersonal.vue')    

    @elseif($modulo=="replicencias")
        @include('reporteJustificacion.vue')

    @elseif($modulo=="oldasistenciaalumnos")
        @include('oldasistenciaalumnos.vue')

    @elseif($modulo=="oldasistenciapersonal")
        @include('oldasistenciapersonal.vue')  

    @elseif($modulo=="ciclos")
        @include('ciclos.vue')     

    @elseif($modulo=="repHorasEfectivas")
        @include('rephorasefectivas.vue')  

    @elseif($modulo=="repHorasEfectivas2")
        @include('rephorasefectivas2.vue')  

    @elseif($modulo=="repHorasEfectivas3")
        @include('rephorasefectivas3.vue')  

    @elseif($modulo=="repHorasEfectivas4")
        @include('rephorasefectivas4.vue')  

    @elseif($modulo=="repAnexo03")
        @include('repanexo03.vue')  

    @elseif($modulo=="repAnexo04")
        @include('repanexo04.vue')  


    @endif
    @endif


    <script type="text/javascript">
        function redondear(num) {
    return +(Math.round(num + "e+2")  + "e-2");
}

function recorrertb(idtb){

    var cont=1;
        $("#"+idtb+" tbody tr").each(function (index)
        {

            $(this).children("td").each(function (index2)
            {
               //alert(index+'-'+index2);

               if(index2==0){
                  $(this).text(cont);
                  cont++;
               }


            })

        })
  }

  function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg': case 'JPG': case 'GIF': case 'PNG': case 'JPEG': case 'jpe': case 'JPE':
            return true;
        break;
        default:
            return false;
        break;
    }
}

function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return ((key >= 48 && key <= 57) || (key==8) || (key==35) || (key==34) || (key==46));
}

function soloNumeros2(e,el){
  var key = window.Event ? e.which : e.keyCode
  
  if(key==105){
   // app.changeLetra(el);
    key=73;
  }
  if(key==106){
    key=74;
   // app.changeLetra(el);
  }
  if(key==102){
    key=70;
   // app.changeLetra(el);
  }

  if(key==108){
    key=76;
   // app.changeLetra(el);
  }


  if(key==104){
    key=72;
   // app.changeLetra(el);
  }

  return ((key >= 48 && key <= 57) || (key==8) || (key==35) || (key==34) || (key==46) || (key==73) || (key==74) || (key==70) || (key==76)  || (key==72));
}



function noEscribe(e){
  var key = window.Event ? e.which : e.keyCode
  return (key==null);
}

function EscribeLetras(e,ele){
  var text=$(ele).val();
  text=text.toUpperCase();
   var pos=posicionCursor(ele);
  $(ele).val(text);

  ponCursorEnPos(pos,ele);
}


function ponCursorEnPos(pos,laCaja){  
    if(typeof document.selection != 'undefined' && document.selection){        //método IE 
        var tex=laCaja.value; 
        laCaja.value='';  
        laCaja.focus(); 
        var str = document.selection.createRange();  
        laCaja.value=tex; 
        str.move("character", pos);  
        str.moveEnd("character", 0);  
        str.select(); 
    } 
    else if(typeof laCaja.selectionStart != 'undefined'){                    //método estándar 
        laCaja.setSelectionRange(pos,pos);  
        //forzar_focus();            //debería ser focus(), pero nos salta el evento y no queremos 
    } 
}  

function posicionCursor(element)
{
       var tb = element;
        var cursor = -1;

        // IE
        if (document.selection && (document.selection != 'undefined'))
        {
            var _range = document.selection.createRange();
            var contador = 0;
            while (_range.move('character', -1))
                contador++;
            cursor = contador;
        }
       // FF
        else if (tb.selectionStart >= 0)
            cursor = tb.selectionStart;

       return cursor;
}

function pad (n, length) {
    var  n = n.toString();
    while(n.length < length)
         n = "0" + n;
    return n;
}

    </script>