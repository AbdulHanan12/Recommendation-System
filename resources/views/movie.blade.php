<x-html-layout>
    <x-slot name="page_title">
        {{$movie->title ?? 'YTS'}}
    </x-slot>

    <x-slot name="page_content">

    <!-- Header movie -->
    <x-header-movie>
		<x-slot name="movie_title">
			{{$movie->title ?? ''}}
            <i class="btn-love @if(is_null($movie->likedMovie)) fa fa-heart-o @else fa fa-heart @endif"
                aria-hidden="true"
                onclick="event.preventDefault();
                document.getElementById('movie_id').value = {{ $movie->id }};
                document.getElementById('like-form').submit();"
            >
            </i>
            <form id="like-form" action="{{ route('like.movie') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" id="movie_id" name="movie_id" value="">
            </form>
		</x-slot>

        <x-slot name="movie_rating">
            @for($i = 1; $i <= 5; $i++)
                <span class="fa fa-star @if($i <= $movie_rating) star-checked @endif"
                onclick="event.preventDefault();
                        document.getElementById('rate_movie_id').value = {{ $movie->id }};
                        document.getElementById('rating').value = {{ $i }};
                        document.getElementById('rating-form').submit();"
                >
                </span>
            @endfor
            <form id="rating-form" action="{{ route('rating') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" id="rating" name="rate" value="0">
                <input type="hidden" id="rate_movie_id" name="movie_id" value="">
            </form>
		</x-slot>

		<x-slot name="movie_description">
			{{$movie->overview ?? ''}}
		</x-slot>

        <x-slot name="movie_image">
            <img src="{{$backdrop_path}}" alt="" class="img-fluid" loading="lazy">
        </x-slot>

		<x-slot name="movie_genres">
            @foreach ($movie->movieGenre->take(2) as $i=>$getGenre)
                @if($i > 0) - @endif <a href="#">{{$getGenre->genre->genre}}</a>
            @endforeach
        </x-slot>

        <x-slot name="movie_tags">
            @foreach ($movie->movieKeywords->take(2) as $i=>$getKeyword)
                @if($i > 0) - @endif <a href="#">{{$getKeyword->keyword->keyword}}</a>
            @endforeach
        </x-slot>

		{{-- <x-slot name="movie_cast">
			actor, actress
		</x-slot> --}}

		<x-slot name="movie_year">
			{{$movie->release_date}}
		</x-slot>
	</x-header-movie>

    <!-- Content Based Recommendations -->
    @if (sizeof($content_movies) > 0)
    <div class="container-fluid recommendations mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="you-d-like text-white">Similar movies...</h2>
            </div>
        </div>

        <!-- Movie recommended -->
        @foreach ($content_movies as $index => $movie)
        {{-- Every 2 movies, start a new row --}}
        @if ($index % 2 == 0)
    <div class="row content_suggestions d-none align-items-md-stretch px-5 my-5">
        @endif
        <x-movie-recommended>
            <x-slot name="index">
                &nbsp; {{$index + 1}} &nbsp;
            </x-slot>

            <x-slot name="img_path">
                {{$base_path . $movie->poster_path}}
            </x-slot>

            <x-slot name="movie_title">
                {{" " . "$movie->title"}}
            </x-slot>

            <x-slot name="movie_description">
                {{substr($movie->overview, 0, 200) . "[...]"}}
            </x-slot>

            <x-slot name="movie_genres">
                @foreach ($movie->movieGenre->take(2) as $i=>$getGenre)
					@if($i > 0) - @endif <a href="#">{{$getGenre->genre->genre}}</a>
			    @endforeach
            </x-slot>

            <x-slot name="movie_tags">
                @foreach ($movie->movieKeywords->take(2) as $i=>$getKeyword)
                    @if($i > 0) - @endif <a href="#">{{$getKeyword->keyword->keyword}}</a>
                @endforeach
            </x-slot>

            <x-slot name="movie_cast">
                actor, actress
            </x-slot>

            <x-slot name="movie_year">
                {{$movie->release_date}}
            </x-slot>

            <x-slot name="movie_id">
                {{$movie->id}}
            </x-slot>
        </x-movie-recommended>
        @if ($index % 2 == 1)
    </div class="boh">
        @endif
        @endforeach
    <a href="#" class="text-center" id="content_loadMore">Load more</a>
    @endif

    <!-- Collaborative Recommendations -->
    @if (sizeof($collab_movies) > 0)
    <div class="container-fluid recommendations mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="you-d-like text-white">Users also liked...</h2>
            </div>
        </div>

        <!-- Movie recommended -->
        @foreach ($collab_movies as $index => $movie)
            {{-- Every 2 movies, start a new row --}}
            @if ($index % 2 == 0)
                <div class="row collab_suggestions d-none align-items-md-stretch px-5 my-5">
            @endif
            <x-movie-recommended>
                <x-slot name="index">
                    &nbsp; {{$index + 1}} &nbsp;
                </x-slot>

                <x-slot name="img_path">
                    {{$base_path . $movie->poster_path}}
                </x-slot>

                <x-slot name="movie_title">
                    {{" " . "$movie->title"}}
                </x-slot>

                <x-slot name="movie_description">
                    {{substr($movie->overview, 0, 200) . "[...]"}}
                </x-slot>

                <x-slot name="movie_genres">
                    @foreach ($movie->movieGenre->take(2) as $i=>$getGenre)
                        @if ($i > 0) - @endif<a href="#">{{$getGenre->genre->genre}}</a>
                    @endforeach
                </x-slot>

                <x-slot name="movie_tags">
                    @foreach ($movie->movieKeywords->take(2) as $i=>$getKeyword)
                    @if ($i > 0) - @endif<a href="#">{{$getKeyword->keyword->keyword}}</a>
                @endforeach
                </x-slot>

                <x-slot name="movie_cast">
                    actor, actress
                </x-slot>

                <x-slot name="movie_year">
                    {{$movie->release_date}}
                </x-slot>

                <x-slot name="movie_id">
                    {{$movie->id}}
                </x-slot>
            </x-movie-recommended>
            @if ($index % 2 == 1)
                </div class="boh">
            @endif
        @endforeach
    <a href="#" class="text-center" id="collab_loadMore">Load more</a>
    @endif

    {{-- @if (sizeof($collab_movies) > 0)
    <div class="container p-5 recommendations">
        <div class="row">
            <div class="col-12">
                <h2 class="you-d-like">Other users also liked...</h2>
            </div>
        </div>


        <!-- Movie recommended -->

        @foreach ($collab_movies as $index => $movie)
        <x-movie-recommended>
            <x-slot name="index">
                {{$index + 1}}
            </x-slot>

            <x-slot name="img_path">
                {{$base_path . $movie->poster_path}}
            </x-slot>

            <x-slot name="movie_title">
                {{$movie->title}}
            </x-slot>

            <x-slot name="movie_description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aperiam, consectetur laborum autem deserunt, minima dolores est repellat magnam laudantium amet, nam fugit eius odit rerum corrupti id officia facilis.
            </x-slot>

            <x-slot name="movie_genres">
                genre, genre
            </x-slot>

            <x-slot name="movie_tags">
                tag, tag
            </x-slot>

            <x-slot name="movie_cast">
                actor, actress
            </x-slot>

            <x-slot name="movie_year">
                2019
            </x-slot>

            <x-slot name="movie_id">
                {{$movie->id}}
            </x-slot>
        </x-movie-recommended>
        @endforeach
    <a href="#" class="text-center" id="loadMore">Load more</a>
    @endif --}}


    </div>
</x-slot>
</x-html-layout>
