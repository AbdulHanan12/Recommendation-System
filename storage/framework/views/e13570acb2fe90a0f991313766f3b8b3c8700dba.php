<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.html-layout','data' => []]); ?>
<?php $component->withName('html-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('page_title', null, []); ?> YTS <?php $__env->endSlot(); ?>
	 <?php $__env->slot('page_content', null, []); ?> 

	<!-- Header movie component details-->
    <?php if(!is_null($headerMovie)): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.header-movie','data' => []]); ?>
<?php $component->withName('header-movie'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('movie_title', null, []); ?> 
                <?php echo e($headerMovie->title); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_description', null, []); ?> 
                <?php echo e($headerMovie->overview); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_genres', null, []); ?> 
                <?php $__currentLoopData = $headerMovie->movieGenre->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i > 0): ?> - <?php endif; ?> <a href="#"><?php echo e($getGenre->genre->genre); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_tags', null, []); ?> 
                <?php $__currentLoopData = $headerMovie->movieKeywords->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getKeyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i > 0): ?> - <?php endif; ?> <a href="#"><?php echo e($getKeyword->keyword->keyword); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $__env->endSlot(); ?>

            

             <?php $__env->slot('movie_year', null, []); ?> 
                <?php echo e($headerMovie->release_date); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('headermovie_calltoaction', null, []); ?> 
                <a href="/movie/<?php echo e($headerMovie->id); ?>"><button type="button" class="btn">More info</button></a>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_image', null, []); ?> 
                <img src="<?php echo e($full_path); ?>" alt="movie poster" class="img-fluid">
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endif; ?>
	<!-- Categories sliders -->
		<!-- Category (with lazy loading and anchor links) -->
		<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(array_key_exists($genre->genre,$genresRandomMovies)): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category-slider','data' => []]); ?>
<?php $component->withName('category-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('category_title', null, []); ?> 
                        <?php echo e($genre->genre); ?>

                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('category_items', null, []); ?> 
                        <?php $__currentLoopData = $genresRandomMovies[$genre->genre]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <a href="/movie/<?php echo e($movie->id); ?>">
                                    <img data-lazy="<?php echo e("$base_path" . $movie->image->poster_path); ?>" alt="<?php echo e($movie->title); ?>" class="img-fluid p-2">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\netflix\resources\views/homepage.blade.php ENDPATH**/ ?>