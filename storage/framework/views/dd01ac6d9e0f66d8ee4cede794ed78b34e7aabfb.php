
    
    
        <div class="col-md-6">
          <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2 class="bg-dark">
                <span class="recommendations-index"><?php echo e($index); ?></span>
                <?php echo e($movie_title); ?>

            </h2>
            <p class="bg-dark"><?php echo e($movie_description); ?></p>
            <p><strong>Genres: </strong><?php echo e($movie_genres); ?></p>
            <p><strong>Tags: </strong><?php echo e($movie_tags); ?></p>
            
            <p><strong>Released: </strong><?php echo e($movie_year); ?></p>
            <a href="/movie/<?php echo e($movie_id); ?>">
                <button class="btn btn-outline-light" type="button">More info</button>
            </a>
          </div>
        </div>
<?php /**PATH C:\laragon\www\netflix\resources\views/components/movie-recommended.blade.php ENDPATH**/ ?>