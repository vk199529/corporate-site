@extends('layouts.app')

@section('content')

<div class="container">

<h1>Blogs</h1>

<div class="row">

@foreach($blogs as $blog)
<div class="col-md-4">

  <img src="{{ asset('storage/'.$blog->image) }}" class="img-fluid">

    <h3>{{ $blog->title }}</h3>

    <a href="{{ url('blog/'.$blog->slug) }}">Read More</a>

</div>
@endforeach

</div>

</div>

@endsection