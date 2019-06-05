<script type="text/javascript">
         let app = new Vue({
    el: '#app',
    data:{
        tipouserPerfil:'{{ $tipouser->nombre }}',
        userPerfil:'{{ Auth::user()->name }}',
        mailPerfil:'{{ Auth::user()->email }}',
        imgPerfil:'{{ $imagenPerfil }}',
        noPerfil:'noPerfil.png',
        titulo:"Reporte de Asistencia",
        subtitulo:"Anexo 04",
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
        classMenu8:'active',
        classMenu9:'',
        classMenu10:'',
        classMenu11:'',
        classMenu12:'',
        classMenu13:'',

        divhome:false,
        divprincipal:true,

        reporte: [],
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

        cbuIE:'',
        nombreIE:'',
        cbuPersonal:0,
        diahoy:'',




        //cabehoy:'Reporte del ',

        anio: '{{$anio}}',
        mes: '{{$mes}}',

        cabesiempre:'Acumulado Histórico',
        caberango:'Desde: ',

        reporte2:[],
        reporte3:[],
        reporte4:[],

        trabajador:'',
        cargo:'',
        t1:'',
        t2:'',
        t3:'',
        nivel:'',

        nivelIE:'',
        modalidadIE:'',
        ugel:'',

        turno:'',

        diasMes:0,

        newobj0:[],



    },
    created:function () {
       this.getDatos();
    },
    mounted: function () {
        this.divloader0=false;

        if(this.imgPerfil.length>0){
            $(".imgPerfil").attr("src","{{ asset('/img/perfil/')}}"+"/"+this.imgPerfil);
        }
        else{
            $(".imgPerfil").attr("src","{{ asset('/img/perfil/')}}"+"/"+this.noPerfil);
        }

        $('#cbuIE').select2();
        $('#cbuGrados').select2();
        $('#cbuSecciones').select2();
 
    },

    methods: {


        ocutarDatos:function(){
            $("#divImp").hide();
        },
        getDatos: function () {
            var busca=this.buscar;
            var url = 'repAnexo3?page='+busca+'&busca='+busca;

            axios.get(url).then(response=>{
               // this.reporte= response.data.reporte.data;
               // this.pagination= response.data.pagination;
               this.institucions= response.data.institucions;
               this.ugel=response.data.ugel;

               this.getDatos2();



            })
        },

        getDatos2: function () {

            this.ocutarDatos();
            this.cbuIE=$("#cbuIE").val();
            this.nombreIE=$("#cbuIE option:selected").text();

            this.modalidadIE=$("#txtmod"+app.cbuIE).val();
            this.nivelIE=$("#txtnivel"+app.cbuIE).val();
            this.turno=$("#txtturno"+app.cbuIE).val();



        },

        getDatos3: function () {

           
            this.cbuIE=$("#cbuIE").val();
            this.nombreIE=$("#cbuIE option:selected").text();

            this.modalidadIE=$("#txtmod"+app.cbuIE).val();
            this.nivelIE=$("#txtnivel"+app.cbuIE).val();
            this.turno=$("#txtturno"+app.cbuIE).val();



        },




        buscarInfo:function () {

            this.getDatos3();

            $("#divImp").show();

           this.buscar1();
              
        },

        buscar1(){
            var url='repAnexo4/buscar';


            this.divloaderNuevo=true;



            var data = new  FormData();

            data.append('idInsti', this.cbuIE);
            data.append('anio', this.anio);
            data.append('mes', this.mes);

            //const config = { headers: { 'Content-Type': 'multipart/form-data' } };


            axios.post(url,data).then(response=>{


                this.divloaderNuevo=false;

                if(response.data.result=='1'){

                    this.reporte= response.data.reporte;
                    this.diasMes= response.data.diasMes;
                    this.newobj0= response.data.newobj0;
                    this.diahoy= response.data.diahoy;

                    $("#divImp").show();
                    //this.institucions= response.data.institucion;
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

             var options = { extraHead : '<style rel="stylesheet" type="text/css" media="print">@page { size: landscape; } body {-webkit-print-color-adjust: exact; } #divImp{width: 29cm!important; } #tituloR{ font-size: 12px; }</style>', strict:false  };


            $("#divImp").printArea(options);
        },

        letrasMes:function(mes){

                 switch(parseInt(mes))
    {
        case 1:
            return 'Enero';
        break;
        case 2:
            return 'Febrero';
        break;
        case 3:
            return 'Marzo';
        break;
        case 4:
            return 'Abril';
        break;
        case 5:
            return 'Mayo';
        break;
        case 6:
            return 'Junio';
        break;
        case 7:
            return 'Julio';
        break;
        case 8:
            return 'Agosto';
        break;
        case 9:
            return 'Setiembre';
        break;
        case 10:
            return 'Octubre';
        break;
        case 11:
            return 'Noviembre';
        break;
        case 12:
            return 'Diciembre';
        break;
        default:
            return 'no válido';
        break;
    }


            },

    }
});

$('#cbuIE').on('select2:select', function (e) {
   app.getDatos2();
});





</script>