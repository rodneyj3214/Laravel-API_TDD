@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h5>Rodney</h5>
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class=card-text>
                        {{ $post->get_excerpt }}
                        <a href="{{ route('post', $post)}}">Leer mas</a>
                    </p>
                    <p class="text-muted mb-0">
                    <em>
                        &ndash; {{ $post->user->name }}
                    </em>
                    {{ $post->created_at->format('d M Y')}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
