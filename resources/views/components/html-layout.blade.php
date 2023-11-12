<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<title>{{ $page_title ?? '' }}</title>

		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{asset('/css/app.css')}}">
	</head>
    <style>
        .btn-love{
            color: red !important;
        }
    </style>
	<body>
		{{-- <x-loader/> --}}

        <x-navbar/>

        {{$page_content}}

		<!-- Example poster path
		<img src="http://image.tmdb.org/t/p/w200/nLvUdqgPgm3F85NMCii9gVFUcet.jpg" alt="copertina film">
			 Example backdrop path
		<img src="http://image.tmdb.org/t/p/w500/9FBwqcd9IRruEDUrTdcaafOMKUq.jpg" alt="copertina film">
		-->

		<!-- Custom JS-->
		<script src="{{asset('js/app.js')}}"></script>
	</body>
	</html>
