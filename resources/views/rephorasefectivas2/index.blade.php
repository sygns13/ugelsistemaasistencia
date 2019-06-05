@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Reportes de Asistencia Anexo 03
@endsection

<style type="text/css">         
          
#modaltamanio{
  width: 70% !important;
}

@media print {
body {-webkit-print-color-adjust: exact;}

#tituloR{ font-size: 12px; }
}

@page { size: landscape!important;; }

</style>
@section('main-content')
	<div class="container-fluid spark-screen">



		<div class="row">

@include('adminlte::layouts.partials.loaders')

			@if(accesoUser([1,2,3]))

<template v-if="divprincipal" id="divprincipal">
	@include('rephorasefectivas2.principal')
</template>
			@endif


		</div>
	</div>
@endsection
