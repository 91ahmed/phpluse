<!DOCTYPE html>
<html lang="en" data-theme="light">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $__env->yieldContent('title'); ?></title>
		<link rel="icon" type="image/png" href="<?php echo e(assets('assets/images/icon.png')); ?>" sizes="16x16">
		<!-- remix icon font css  -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/remixicon.css')); ?>">
		<!-- BootStrap css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/bootstrap.min.css')); ?>">
		<!-- Apex Chart css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/apexcharts.css')); ?>">
		<!-- Data Table css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/dataTables.min.css')); ?>">
		<!-- Text Editor css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/editor-katex.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/editor.atom-one-dark.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/editor.quill.snow.css')); ?>">
		<!-- Date picker css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/flatpickr.min.css')); ?>">
		<!-- Calendar css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/full-calendar.css')); ?>">
		<!-- Vector Map css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/jquery-jvectormap-2.0.5.css')); ?>">
		<!-- Popup css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/magnific-popup.css')); ?>">
		<!-- Slick Slider css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/lib/slick.css')); ?>">
		<!-- Nostfly -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/nostfly.css')); ?>">
		<!-- main css -->
		<link rel="stylesheet" href="<?php echo e(assets('assets/css/style.css')); ?>">
	</head>
	<body>
		<?php echo $__env->make('layout.sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<main class="dashboard-main">
			<?php echo $__env->make('layout.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div class="dashboard-main-body">

				<?php echo $__env->yieldContent('content'); ?>

			</div><!-- dashboard-main-body -->

			<footer class="d-footer">
				<div class="row align-items-center justify-content-between">
					<div class="col-auto">
						<p class="mb-0">© <?php echo e(date('Y')); ?>. All Rights Reserved.</p>
					</div>
					<div class="col-auto">
						<p class="mb-0">Made by <a href="https://91ahmed.github.io" target="_blank" class="text-primary-600">AhmedHassan</a></p>
					</div>
				</div>
			</footer>
		</main>

		<!-- jQuery library js -->
		<script src="<?php echo e(assets('assets/js/lib/jquery-3.7.1.min.js')); ?>"></script>
		<!-- Bootstrap js -->
		<script src="<?php echo e(assets('assets/js/lib/bootstrap.bundle.min.js')); ?>"></script>
		<!-- Apex Chart js -->
		<script src="<?php echo e(assets('assets/js/lib/apexcharts.min.js')); ?>"></script>
		<!-- Data Table js -->
		<script src="<?php echo e(assets('assets/js/lib/dataTables.min.js')); ?>"></script>
		<!-- Iconify Font js -->
		<script src="<?php echo e(assets('assets/js/lib/iconify-icon.min.js')); ?>"></script>
		<!-- jQuery UI js -->
		<script src="<?php echo e(assets('assets/js/lib/jquery-ui.min.js')); ?>"></script>
		<!-- Vector Map js -->
		<script src="<?php echo e(assets('assets/js/lib/jquery-jvectormap-2.0.5.min.js')); ?>"></script>
		<script src="<?php echo e(assets('assets/js/lib/jquery-jvectormap-world-mill-en.js')); ?>"></script>
		<!-- Popup js -->
		<script src="<?php echo e(assets('assets/js/lib/magnifc-popup.min.js')); ?>"></script>
		<!-- Slick Slider js -->
		<script src="<?php echo e(assets('assets/js/lib/slick.min.js')); ?>"></script>
		<!-- main js -->
		<script src="<?php echo e(assets('assets/js/app.js')); ?>"></script>
		<script src="<?php echo e(assets('assets/js/homeTwoChart.js')); ?>"></script>
		<!-- Nostfly -->
		<script src="<?php echo e(assets('assets/js/nostfly.js')); ?>"></script>
		<script src="<?php echo e(assets('assets/js/main.js')); ?>"></script>
	</body>
</html>