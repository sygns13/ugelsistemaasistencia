<?php $__env->startSection('htmlheader_title'); ?>
	Gestión de Usuarios
<?php $__env->stopSection(); ?>

<style type="text/css">         
          
#modaltamanio{
  width: 70% !important;
}

</style>
<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">



		<div class="row">

<?php echo $__env->make('adminlte::layouts.partials.loaders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<?php if(accesoUser([1,2])): ?>

<template v-if="divusuario" id="divusuario">
	<?php echo $__env->make('usuarios.usuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</template>
			<?php endif; ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\ugel carhuaz\ugelsistemaasistencia\resources\views/usuarios/index.blade.php ENDPATH**/ ?>