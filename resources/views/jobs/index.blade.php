@extends('layouts.app')

@section('content')

<div class="container">

<h2>Job Openings</h2>

@foreach($jobs as $job)

    <div class="mb-4 border-bottom pb-3">

        <h4>
            <a href="{{ url('jobs/'.$job->slug) }}">
                {{ $job->title }}
            </a>
        </h4>

        <p>
            {{ \Str::limit(strip_tags($job->content), 120) }}
        </p>

        <small>
            Published: {{ $job->published_at }}
        </small>

    </div>

@endforeach

</div>

@endsection