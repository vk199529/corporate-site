@extends('layouts.app')

@section('content')

<section class="container">

<h1>{{ $page->title }}</h1>

<div class="contact-content">

{!! $page->content !!}

</div>

</section>

@endsection