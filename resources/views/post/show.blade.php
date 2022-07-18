@extends('layouts.main')
@section('content')
    <div class="d-flex">
        <div>
            <a class="btn btn-primary" href="{{ route('post.index') }}">Come Back</a>
        </div>
        <div class="ms-1">
            <a class="btn btn-warning" href="{{ route('post.edit', $post->id) }}">Edit</a>
        </div>
        <div class="ms-1">
            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Delete">
            </form>
        </div>
    </div>
    <div class="mt-3">
        <div><span class="fw-bold">{{ $post->id }}</span>. {{ $post->title }}</div>
        <div>{{ $post->content }}</div>
    </div>
@endsection
