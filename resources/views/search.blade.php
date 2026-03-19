@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Search Results for: "{{ $query }}"</h2>

    @if($blogs->count())

    @foreach($blogs as $blog)

    <div class="d-flex mb-4 border-bottom pb-3">

        <div style="width:80px; margin-right:15px;">
            <img src="{{ asset('storage/'.$blog->image) }}" style="width:100%; border-radius:5px;">
        </div>

        <div>
            <h5>
                <a href="{{ url('blog/'.$blog->slug) }}">
                    {{ $blog->title }}
                </a>
            </h5>

            <p style="color:#666;">
                {{ \Str::limit(strip_tags($blog->content), 120) }}
            </p>
        </div>

    </div>

    @endforeach

    @else

    <p>No results found 😔</p>

    @endif

</div>

@endsection