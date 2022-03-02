<script type="text/javascript">
         let app = new Vue({
    el: '#app',
    data:{
        tipouserPerfil:'<?php echo e($tipouser->nombre); ?>',
        userPerfil:'<?php echo e(Auth::user()->name); ?>',
        mailPerfil:'<?php echo e(Auth::user()->email); ?>',
        imgPerfil:'<?php echo e($imagenPerfil); ?>',
        noPerfil:'noPerfil.png',
        titulo:"Reporte de Justificaciones",
        subtitulo:"Imprimir",
        subtitle2:false,
        subtitulo2:"",
        divloader0:true,
        divloader1:false,
        divloader2:false,
        divloader3:false,
        divloader4:false,
        divloader5:false,
        divloader6:false,
        divloader7:false,
        divloader8:false,
        divloader9:false,
        divloader10:false,
        divtitulo:true,
        classTitle:'fa fa-print',
        classMenu0:'',
        classMenu1:'',
        classMenu2:'',
        classMenu3:'',
        classMenu4:'',
        classMenu5:'',
        classMenu6:'',
        classMenu7:'',
        classMenu8:'',
        classMenu9:'active',
        classMenu10:'',
        classMenu11:'',
        classMenu12:'',
        classMenu13:'',

        divhome:false,
        divprincipal:true,

        report: [],
        errors:[],
        divloaderNuevo:false,
        divloaderEdit:false,

        cbufecha:0,

        fechaini:'',
        fechafin:'',
        institucions:[],
        personals:[],
        selectInsti:false,
        selectPersonal:false,

        cbuIE:0,
        nombreIE:'',
        cbuPersonal:0,




        cabehoy:'Registros que cubren la fecha: <?php echo e($fecha); ?>',
        cabemes:'Registros que cubren días del mes de <?php echo e(nombremes($mesActual)); ?> de <?php echo e($yearActual); ?>',
        cabeyear:'Registros del año <?php echo e($yearActual); ?>',
        cabesiempre:'Acumulado Histórico',
        caberango:'Desde: ',



    },
    created:function () {
        this.getDatos();
    },
    mounted: function () {
        this.divloader0=false;

        if(this.imgPerfil.length>0){
            $(".imgPerfil").attr("src","<?php echo e(asset('/img/perfil/')); ?>"+"/"+this.imgPerfil);
        }
        else{
            $(".imgPerfil").attr("src","<?php echo e(asset('/img/perfil/')); ?>"+"/"+this.noPerfil);
        }

        $('#cbuIE').select2();
        $('#cbuGrados').select2();
        $('#cbuSecciones').select2();
 
    },

    methods: {
        getDatos: function () {
            var busca=this.buscar;
            var url = 'reporteLicencia?page='+busca+'&busca='+busca;

            axios.get(url).then(response=>{
               // this.reporte= response.data.reporte.data;
               // this.pagination= response.data.pagination;
               this.institucions= response.data.institucions;


            })
        },

        getDatos2: function () {
            this.cbuIE=$("#cbuIE").val();
            this.nombreIE=$("#cbuIE option:selected").text();

            if(parseInt(this.cbuIE)>0){

          var url = 'reporteLicencia/getPersonal/'+this.cbuIE;

            axios.get(url).then(response=>{

               this.personals= response.data.personals;
               this.selectInsti=true;
               this.$nextTick(function () {
                $('#cbuPersonal').select2();

                })
            })
                
            }
            else{   
                this.selectInsti=false;
                this.selectSeccion=false;
                this.personals=[];
            }
            
        },



        buscarInfo:function () {
              var url='reporteLicencia/buscar';


            this.divloaderNuevo=true;



            var data = new  FormData();

            data.append('idInsti', this.cbuIE);
            data.append('idPersonal', this.cbuPersonal);

            data.append('tipofecha', this.cbufecha);
            data.append('fechaini', this.fechaini);
            data.append('fechafin', this.fechafin);

            //const config = { headers: { 'Content-Type': 'multipart/form-data' } };


            axios.post(url,data).then(response=>{


                this.divloaderNuevo=false;

                if(response.data.result=='1'){

                    this.report= response.data.datos;
                    toastr.success(response.data.msj);
                }else{
                    toastr.error(response.data.msj);
                }
            }).catch(error=>{
                this.errors=error.response.data
            })
        },

        buscarBtn: function () {
            this.getDatos();
        },
      
         pasfechaVista:function(date) 
        {
    date=date.slice(-2)+'/'+date.slice(-5,-3)+'/'+date.slice(0,4);

    return date;
        },
        imprimirPlantilla:function () {

             var options = { extraHead : '<style rel="stylesheet" type="text/css" media="print"> body {-webkit-print-color-adjust: exact; } .saltoDePagina{ display:block; page-break-before:always;} #btncrearArea{display: none!important;} .columnanoprint{display: none!important;}</style>', strict:false  };
            $("#divImp").printArea(options);
        }
    }
});

$('#cbuIE').on('select2:select', function (e) {
    app.getDatos2();
});




</script><?php /**PATH D:\Proyectos\ugel carhuaz\ugelsistemaasistencia\resources\views/reporteJustificacion/vue.blade.php ENDPATH**/ ?>