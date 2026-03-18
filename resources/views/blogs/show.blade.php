@extends('layouts.app')

@section('content')

<div class="container">

<h1>{{ $blog->title }}</h1>

<img src="{{ asset('storage/'.$blog->image) }}" class="img-fluid mb-3">

<div>
    {!! $blog->content !!}
</div>

</div>

@endsection