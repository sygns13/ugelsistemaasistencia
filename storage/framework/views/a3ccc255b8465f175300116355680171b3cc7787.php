<?php $__env->startSection('htmlheader_title'); ?>
	Reportes de Horas Efectivas Docentes
<?php $__env->stopSection(); ?>

<style type="text/css">         
          
#modaltamanio{
  width: 70% !important;
}

@media  print {
body {-webkit-print-color-adjust: exact;}

#tituloR{ font-size: 12px; }
}

@page  { size: landscape!important;; }

</style>
<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">



		<div class="row">

<?php echo $__env->make('adminlte::layouts.partials.loaders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<?php if(accesoUser([1,2,3])): ?>

<template v-if="divprincipal" id="divprincipal">
	<?php echo $__env->make('rephorasefectivas.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
			<?php endif; ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\ugel carhuaz\ugelsistemaasistencia\resources\views/rephorasefectivas/index.blade.php ENDPATH**/ ?>