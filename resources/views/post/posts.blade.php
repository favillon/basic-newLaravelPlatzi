@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">                        
                        @if ($post->img)
                            <img src="{{ $post->ruta_img }}" alt="" class="card-img-top" />
                        @elseif($post->iframe)
                            <div class="embed-responsive embed-responsive-16by9">
                                {!! $post->iframe !!}
                            </div>
                        @endif
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">
                            {{ $post->extract }}
                            <a href="{{ route('post', $post) }}">Leer mas</a>
                        </p>
                        <p class=text-muted mb-0>
                            <em>
                                &ndash; {{ $post->user->name }}
                            </em>
                            {{ $post->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
