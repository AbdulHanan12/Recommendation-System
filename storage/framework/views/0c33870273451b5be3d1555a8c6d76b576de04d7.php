<!-- Header movie -->
<div class="container-fluid">
    <div class="row p-5">
        <div class="col-12 col-md-6">
            <h1><?php echo e($movie_title ?? ''); ?></h1>
            <p><strong>Rate: </strong><?php echo e($movie_rating ?? ''); ?></p>
            <p class="movie-description"><?php echo e($movie_description ?? ''); ?></p>
            <p><strong>Genres: </strong><?php echo e($movie_genres ?? ''); ?></p>
            <p><strong>Tags: </strong><?php echo e($movie_tags ?? ''); ?></p>
            <p><strong>Released: </strong><?php echo e($movie_year ?? ''); ?></p>

            <?php echo e($headermovie_calltoaction ?? ""); ?>

        </div>
        <div class="col-12 col-md-6 d-flex align-item-center justify-content-center">
            <?php echo e($movie_image); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\netflix\resources\views/components/header-movie.blade.php ENDPATH**/ ?>