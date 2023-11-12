<x-html-layout>
	<x-slot name="page_title">YTS</x-slot>
	<x-slot name="page_content">

	<!-- Header movie component details-->
    @if(!is_null($headerMovie))
        <x-header-movie>
            <x-slot name="movie_title">
                {{$headerMovie->title}}
            </x-slot>

            <x-slot name="movie_description">
                {{$headerMovie->overview}}
            </x-slot>

            <x-slot name="movie_genres">
                @foreach ($headerMovie->movieGenre->take(2) as $i=>$getGenre)
                        @if($i > 0) - @endif <a href="#">{{$getGenre->genre->genre}}</a>
                @endforeach
            </x-slot>

            <x-slot name="movie_tags">
                @foreach ($headerMovie->movieKeywords->take(2) as $i=>$getKeyword)
                    @if($i > 0) - @endif <a href="#">{{$getKeyword->keyword->keyword}}</a>
                @endforeach
            </x-slot>

            {{-- <x-slot name="movie_cast">
                actor, actress
            </x-slot> --}}

            <x-slot name="movie_year">
                {{$headerMovie->release_date}}
            </x-slot>

            <x-slot name="headermovie_calltoaction">
                <a href="/movie/{{$headerMovie->id}}"><button type="button" class="btn">More info</button></a>
            </x-slot>

            <x-slot name="movie_image">
                <img src="{{$full_path}}" alt="movie poster" class="img-fluid">
            </x-slot>
        </x-header-movie>
    @endif
	<!-- Categories sliders -->
		<!-- Category (with lazy loading and anchor links) -->
		@foreach ($genres as $genre)
            @if(array_key_exists($genre->genre,$genresRandomMovies))
                <x-category-slider>
                    <x-slot name="category_title">
                        {{$genre->genre}}
                    </x-slot>
                    <x-slot name="category_items">
                        @foreach ($genresRandomMovies[$genre->genre] as $movie)
                            <div>
                                <a href="/movie/{{$movie->id}}">
                                    <img data-lazy="{{"$base_path" . $movie->image->poster_path}}" alt="{{$movie->title}}" class="img-fluid p-2">
                                </a>
                            </div>
                        @endforeach
                        {{-- @foreach ($genre->getMovies()->inRandomOrder()->limit(3)->get() as $movie)
                            <div>
                                <a href="/movie">
                                    <img data-lazy="{{$movie->poster_path}}" alt="copertina film">
                                </a>
                            </div>
                        @endforeach --}}
                    </x-slot>
                </x-category-slider>
            @endif
		@endforeach
</x-slot name="page_content">
</x-html-layout>
