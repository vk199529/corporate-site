@extends('layouts.app')

@section('content')

<section class="container">

<h1>{{ $page->title }}</h1>

<div class="about-content">

{!! $page->content !!}


<p>This is about page</p>

</div>

</section>

@endsection