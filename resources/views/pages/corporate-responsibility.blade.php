@extends('layouts.app')

@section('content')

<section class="container">

<h1>{{ $page->title }}</h1>

<div class="corporate-responsibility-content">

{!! $page->content !!}

</div>

</section>

@endsection