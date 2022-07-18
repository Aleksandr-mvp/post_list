@extends('layouts.admin')

@section('content')
    <div>
        <div>
            <a class="btn btn-primary mb-3" href="{{ route('admin.post.create') }}">Add Post</a>
        </div>
        @foreach($posts as $post)
            <div class="pb-2">
                {{ $post->id }}.
                <a class="text-decoration-none" href="{{ route('admin.post.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </div>
        @endforeach
        <div class="mt-2">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
