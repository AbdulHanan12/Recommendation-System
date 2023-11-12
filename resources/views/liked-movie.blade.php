<x-html-layout>
	<x-slot name="page_title">YTS</x-slot>
	<x-slot name="page_content">
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
                    </x-slot>
                </x-category-slider>
            @endif
		@endforeach
</x-slot name="page_content">
</x-html-layout>
