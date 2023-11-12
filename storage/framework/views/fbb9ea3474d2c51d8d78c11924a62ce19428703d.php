<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-5">
    <div class="container-fluid">
        <a class="nav-link" href="/"><span class="navbar-brand">YTS</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="/">Home</a>
            </div>
            <div class="d-flex ms-auto" >
                <a href="<?php echo e(route('user.movies')); ?>"><i class="btn-love fa fa-heart" style="padding: 10px;">Movies</i></a>
                <input id="input_search" class="form-control me-2" type="search" placeholder="Search by Title...." aria-label="Search">
                <button class="btn searchButton" onclick="searchMovies()" type="submit">Search</button>
                <a
                    style="text-decoration: none; padding:5px;" href="javascript:void(0)"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                  <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    function searchMovies(){

        window.location.href = "/?search="+document.getElementById("input_search").value+"";
    }
</script>
<?php /**PATH C:\laragon\www\netflix\resources\views/components/navbar.blade.php ENDPATH**/ ?>