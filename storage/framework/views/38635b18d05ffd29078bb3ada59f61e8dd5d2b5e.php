<?php $__env->startSection('htmlheader_title'); ?>
	Rectificar o Completar Asistencia Personal
<?php $__env->stopSection(); ?>

<style type="text/css">         
          
#modaltamanio{
  width: 80% !important;
}

</style>
<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">



		<div class="row">

<?php echo $__env->make('adminlte::layouts.partials.loaders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<?php if(accesoUser([1,2,3])): ?>

<template v-if="divPrincipal" id="divPrincipal">
	<?php echo $__env->make('oldasistenciapersonal.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
			<?php endif; ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\ugel carhuaz\ugelsistemaasistencia\resources\views/oldasistenciapersonal/index.blade.php ENDPATH**/ ?>