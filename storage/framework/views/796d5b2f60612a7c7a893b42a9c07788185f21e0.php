<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.html-layout','data' => []]); ?>
<?php $component->withName('html-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('page_title', null, []); ?> 
        <?php echo e($movie->title ?? 'YTS'); ?>

     <?php $__env->endSlot(); ?>

     <?php $__env->slot('page_content', null, []); ?> 

    <!-- Header movie -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.header-movie','data' => []]); ?>
<?php $component->withName('header-movie'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
		 <?php $__env->slot('movie_title', null, []); ?> 
			<?php echo e($movie->title ?? ''); ?>

            <i class="btn-love <?php if(is_null($movie->likedMovie)): ?> fa fa-heart-o <?php else: ?> fa fa-heart <?php endif; ?>"
                aria-hidden="true"
                onclick="event.preventDefault();
                document.getElementById('movie_id').value = <?php echo e($movie->id); ?>;
                document.getElementById('like-form').submit();"
            >
            </i>
            <form id="like-form" action="<?php echo e(route('like.movie')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="movie_id" name="movie_id" value="">
            </form>
		 <?php $__env->endSlot(); ?>

         <?php $__env->slot('movie_rating', null, []); ?> 
            <?php for($i = 1; $i <= 5; $i++): ?>
                <span class="fa fa-star <?php if($i <= $movie_rating): ?> star-checked <?php endif; ?>"
                onclick="event.preventDefault();
                        document.getElementById('rate_movie_id').value = <?php echo e($movie->id); ?>;
                        document.getElementById('rating').value = <?php echo e($i); ?>;
                        document.getElementById('rating-form').submit();"
                >
                </span>
            <?php endfor; ?>
            <form id="rating-form" action="<?php echo e(route('rating')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="rating" name="rate" value="0">
                <input type="hidden" id="rate_movie_id" name="movie_id" value="">
            </form>
		 <?php $__env->endSlot(); ?>

		 <?php $__env->slot('movie_description', null, []); ?> 
			<?php echo e($movie->overview ?? ''); ?>

		 <?php $__env->endSlot(); ?>

         <?php $__env->slot('movie_image', null, []); ?> 
            <img src="<?php echo e($backdrop_path); ?>" alt="" class="img-fluid" loading="lazy">
         <?php $__env->endSlot(); ?>

		 <?php $__env->slot('movie_genres', null, []); ?> 
            <?php $__currentLoopData = $movie->movieGenre->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i > 0): ?> - <?php endif; ?> <a href="#"><?php echo e($getGenre->genre->genre); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php $__env->endSlot(); ?>

         <?php $__env->slot('movie_tags', null, []); ?> 
            <?php $__currentLoopData = $movie->movieKeywords->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getKeyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i > 0): ?> - <?php endif; ?> <a href="#"><?php echo e($getKeyword->keyword->keyword); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php $__env->endSlot(); ?>

		

		 <?php $__env->slot('movie_year', null, []); ?> 
			<?php echo e($movie->release_date); ?>

		 <?php $__env->endSlot(); ?>
	 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <!-- Content Based Recommendations -->
    <?php if(sizeof($content_movies) > 0): ?>
    <div class="container-fluid recommendations mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="you-d-like text-white">Similar movies...</h2>
            </div>
        </div>

        <!-- Movie recommended -->
        <?php $__currentLoopData = $content_movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($index % 2 == 0): ?>
    <div class="row content_suggestions d-none align-items-md-stretch px-5 my-5">
        <?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.movie-recommended','data' => []]); ?>
<?php $component->withName('movie-recommended'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('index', null, []); ?> 
                &nbsp; <?php echo e($index + 1); ?> &nbsp;
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('img_path', null, []); ?> 
                <?php echo e($base_path . $movie->poster_path); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_title', null, []); ?> 
                <?php echo e(" " . "$movie->title"); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_description', null, []); ?> 
                <?php echo e(substr($movie->overview, 0, 200) . "[...]"); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_genres', null, []); ?> 
                <?php $__currentLoopData = $movie->movieGenre->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($i > 0): ?> - <?php endif; ?> <a href="#"><?php echo e($getGenre->genre->genre); ?></a>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_tags', null, []); ?> 
                <?php $__currentLoopData = $movie->movieKeywords->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getKeyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i > 0): ?> - <?php endif; ?> <a href="#"><?php echo e($getKeyword->keyword->keyword); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_cast', null, []); ?> 
                actor, actress
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_year', null, []); ?> 
                <?php echo e($movie->release_date); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('movie_id', null, []); ?> 
                <?php echo e($movie->id); ?>

             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php if($index % 2 == 1): ?>
    </div class="boh">
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <a href="#" class="text-center" id="content_loadMore">Load more</a>
    <?php endif; ?>

    <!-- Collaborative Recommendations -->
    <?php if(sizeof($collab_movies) > 0): ?>
    <div class="container-fluid recommendations mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="you-d-like text-white">Users also liked...</h2>
            </div>
        </div>

        <!-- Movie recommended -->
        <?php $__currentLoopData = $collab_movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if($index % 2 == 0): ?>
                <div class="row collab_suggestions d-none align-items-md-stretch px-5 my-5">
            <?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.movie-recommended','data' => []]); ?>
<?php $component->withName('movie-recommended'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                 <?php $__env->slot('index', null, []); ?> 
                    &nbsp; <?php echo e($index + 1); ?> &nbsp;
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('img_path', null, []); ?> 
                    <?php echo e($base_path . $movie->poster_path); ?>

                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_title', null, []); ?> 
                    <?php echo e(" " . "$movie->title"); ?>

                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_description', null, []); ?> 
                    <?php echo e(substr($movie->overview, 0, 200) . "[...]"); ?>

                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_genres', null, []); ?> 
                    <?php $__currentLoopData = $movie->movieGenre->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i > 0): ?> - <?php endif; ?><a href="#"><?php echo e($getGenre->genre->genre); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_tags', null, []); ?> 
                    <?php $__currentLoopData = $movie->movieKeywords->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$getKeyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i > 0): ?> - <?php endif; ?><a href="#"><?php echo e($getKeyword->keyword->keyword); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_cast', null, []); ?> 
                    actor, actress
                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_year', null, []); ?> 
                    <?php echo e($movie->release_date); ?>

                 <?php $__env->endSlot(); ?>

                 <?php $__env->slot('movie_id', null, []); ?> 
                    <?php echo e($movie->id); ?>

                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if($index % 2 == 1): ?>
                </div class="boh">
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <a href="#" class="text-center" id="collab_loadMore">Load more</a>
    <?php endif; ?>

    


    </div>
 <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\netflix\resources\views/movie.blade.php ENDPATH**/ ?>