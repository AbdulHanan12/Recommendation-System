<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<title><?php echo e($page_title ?? ''); ?></title>

		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
	</head>
    <style>
        .btn-love{
            color: red !important;
        }
    </style>
	<body>
		

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.navbar','data' => []]); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <?php echo e($page_content); ?>


		<!-- Example poster path
		<img src="http://image.tmdb.org/t/p/w200/nLvUdqgPgm3F85NMCii9gVFUcet.jpg" alt="copertina film">
			 Example backdrop path
		<img src="http://image.tmdb.org/t/p/w500/9FBwqcd9IRruEDUrTdcaafOMKUq.jpg" alt="copertina film">
		-->

		<!-- Custom JS-->
		<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	</body>
	</html>
<?php /**PATH C:\laragon\www\netflix\resources\views/components/html-layout.blade.php ENDPATH**/ ?>