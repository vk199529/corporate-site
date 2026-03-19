@extends('layouts.app')

@section('content')

<div class="container">

<h1>{{ $job->title }}</h1>

<div>
    {!! $job->content !!}
</div>

</div>

@endsection