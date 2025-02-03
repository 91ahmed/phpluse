<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
	<h6 class="fw-semibold mb-0">Dashboard</h6>
	<ul class="d-flex align-items-center gap-2">
		<li class="fw-medium">Home</li>
	</ul>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>