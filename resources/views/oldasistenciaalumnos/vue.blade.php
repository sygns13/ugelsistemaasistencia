<script type="text/javascript">
         let app = new Vue({
    el: '#app',
    data:{
        tipouserPerfil:'{{ $tipouser->nombre }}',
        userPerfil:'{{ Auth::user()->name }}',
        mailPerfil:'{{ Auth::user()->email }}',
        imgPerfil:'{{ $imagenPerfil }}',
        noPerfil:'noPerfil.png',

        titulo:"Registro de Asistencia",
        subtitulo:"Alumnos de Instituciones Educativas",
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
        classTitle:'fa fa-calendar-check-o',
        classMenu0:'',
        classMenu1:'',
        classMenu2:'',
        classMenu3:'',
        classMenu4:'',
        classMenu5:'',
        classMenu6:'',
        classMenu7:'',
        classMenu8:'',
        classMenu9:'',
        classMenu10:'',
        classMenu11:'active',
        classMenu12:'',
        classMenu13:'',

        divPrincipal:true,

        institucion: [],
        datosColegio: [],
        numAlumnos:[],
        numTurnos:[],
        nivel: [],
        tipogestion: [],
        tipoie: [],

        grados: [],
        secciones:[],


        fillInstitucion:{'id':''},

        errors:[],
        fillCamposProfs:{'id':'', 'nombre':'', 'orden':'','activo':'1','metodologiavocacional_id':''},
        pagination: {
        'total': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to': 0
                },
        offset: 9,
        buscar:'',
        divloaderEdit:false,

        @php
        $bandera=false;
        @endphp
        @foreach($turnoActivo as $dato)
        keyturno:'{{ $dato->id }}',
        turno:'{{ $dato->descripcion }}',
        horaini:'{{ $dato->horaIni }}',
        horafin:'{{ $dato->horaFin }}',
        @php
        $bandera=true;
        @endphp
        @endforeach

        @if($bandera==false)
         keyturno:'',
        turno:'No hay un turno activo en este momento',
        horaini:'',
        horafin:'',
        @endif
        

        fecha:'{{ $fecha }}',
        hora:'{{ $hora }}',

        yA:{{ $yearActual }},
        mA:{{ $mesActual }},
        dA:{{ $diaActual }},
        hA:{{ $horaActual }},
        mA:{{ $minActual }},
        sA:{{ $secActual }},

        horaSis: new Date({{ $yearActual }}, {{ $mesActual }}, {{ $diaActual }}, {{ $horaActual }}, {{ $minActual }}, {{ $secActual }}),

        thispage:'1',

        turns:[],

        fecnow:'{{ $fecnow }}'



    },
    created:function () {

        this.getMainAsistenciaAlumnos(this.thispage);
    },
    mounted: function () {
        this.divloader0=false;

        if(this.imgPerfil.length>0){
            $(".imgPerfil").attr("src","{{ asset('/img/perfil/')}}"+"/"+this.imgPerfil);
        }
        else{
            $(".imgPerfil").attr("src","{{ asset('/img/perfil/')}}"+"/"+this.noPerfil);
        }
     
 
    },
    computed:{
        isActived: function(){
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if(!this.pagination.to){
                return [];
            }

            var from=this.pagination.current_page - this.offset 
            var from2=this.pagination.current_page - this.offset 
            if(from<1){
                from=1;
            }

            var to= from2 + (this.offset*2); 
            if(to>=this.pagination.last_page){
                to=this.pagination.last_page;
            }

            var pagesArray = [];
            while(from<=to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    methods: {
        Asistencia:function(institucion){
            //alert(idinsti);

            var fec=this.fecnow;
            var url = 'OldAsistenciaAlumnos/abrirIE/'+institucion.idcolegio+'/'+fec;
                            axios.get(url).then(response=>{//eliminamos

                            if(response.data.result=='1'){
                                toastr.success(response.data.msj);
                                app.grados=response.data.grados;
                                app.secciones=response.data.secciones;
                $("#boxTitulo").text('Institución educativa: '+institucion.nombre+' Código Modular: '+institucion.codigomod);
                $("#modalAsistencia").modal('show');
                this.$nextTick(function () {
                    $(".txtAs:first").focus();
                  })
                                
                            }else{
                               // $('#'+response.data.selector).focus();
                                toastr.error(response.data.msj);
                            }
                            });
        },
 
        getMainAsistenciaAlumnos: function (page) {
            var busca=this.buscar;
            var fec=this.fecnow;
            var urlCampos ='OldAsistenciaAlumnos?page='+page+'&busca='+busca+'&fecnow='+fec;

            axios.get(urlCampos).then(response=>{

        this.institucion=response.data.institucion.data;
        this.pagination= response.data.pagination;
        this.numAlumnos=response.data.numAlumnos;
        this.numTurnos=response.data.numTurnos;
        this.turns=response.data.turns;
        this.fecha=this.pasfechaVista(response.data.fecha);

      

            })
        },
        buscarFecha:function(){
            this.getMainAsistenciaAlumnos();
            swal('','Día Seleccionado Cargado','success');
            this.thispage='1';
        },
        getTurnos:function () {
        
        var variable=app.keyturno;

        if(variable.length==0){
            variable="1";
        }

                            var url = 'AsistenciaAlumnos/revTurno/'+variable+'';
                            axios.get(url).then(response=>{

                    
                                //app.getMainAsistenciaAlumnos(app.thispage);//listamos
                                app.keyturno=String(response.data.keyturno);
                                app.turno=response.data.turno;
                                app.horaini=response.data.horaini;
                                app.horafin=response.data.horafin;
                                if(response.data.result=="1"){
                                    toastr.success(response.data.msj);

                                }
                                else{
                                    toastr.error(response.data.msj);
                                }
            
        
                            });
                        
                   
        },

        createAsistencias:function () {
            var b=true;
            var b1=true;
            var b2=true;
            var idSec="";
            $.each(app.secciones, function( i, sec ) {
                  //alert( index + ": " + value );
                 // console.log(app.secciones[i].cantasist)
            if(String(app.secciones[i].activoDia)=="1" ){
                if(isNaN(parseInt(app.secciones[i].cantasist))==true){
                    idSec=app.secciones[i].idSec;
                    b=false;
                }else{
                    if(parseInt(app.secciones[i].cantasist)<0){
                        idSec=app.secciones[i].idSec;
                        b1=false;
                    }
                    else{
                        if(parseInt(app.secciones[i].cantasist)>parseInt(app.secciones[i].cantalumnos)){
                        idSec=app.secciones[i].idSec;
                        b2=false;
                        }
                    }
                }

            }

                });

            if(b==true){
                    if(b1==true){
                            if(b2==true){
                                


            var url='OldAsistenciaAlumnos';
            $("#btnSaveE").attr('disabled', true);
            $("#btnCancelE").attr('disabled', true);
            //$("#btnClose").attr('disabled', true);
            this.divloaderEdit=true;
            axios.post(url,{secciones:this.secciones, keyturno:this.keyturno, fecnow:this.fecnow }).then(response=>{
                //console.log(response.data);

                $("#btnSaveE").removeAttr("disabled");
                $("#btnCancelE").removeAttr("disabled");
                //$("#btnClose").removeAttr("disabled");
                this.divloaderEdit=false;

                if(response.data.result=='1'){
                    this.getMainAsistenciaAlumnos(this.thispage);
                    this.errors=[];
                    $("#modalAsistencia").modal('hide');
                    toastr.success(response.data.msj);
                }else{
                    $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
            }).catch(error=>{
                this.errors=error.response.data
            })



                                }
                            else{
                                toastr.error("La Cantidad de Asistentes no puede ser mayor a la cantidad de alumnos");
                                $("#txtAsist"+idSec).focus();
                                }
                    }
                else{
                    toastr.error("La Cantidad de Asistentes no puede ser menor a cero");
                    $("#txtAsist"+idSec).focus();
                    }
                }
            else{
                toastr.error("Complete adecuadamente la cantidad de Asistentes");
                $("#txtAsist"+idSec).focus();
            }


        },





















        changePage:function (page) {
            this.pagination.current_page=page;
            this.getMainAsistenciaAlumnos(page);
            this.thispage=page;
        },
        buscarBtn: function () {
            this.getMainAsistenciaAlumnos();
            this.thispage='1';
        },
       

        pasfechaVista:function(date) 
        {
    date=date.slice(-2)+'/'+date.slice(-5,-3)+'/'+date.slice(0,4);

    return date;
        },
    }
});
</script>