@extends('layouts.admin')
@section('content')
    <div>
        <form action="{{ route('admin.post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ $post->title }}" type="text" name="title" class="form-control" id="title"
                       placeholder="title...">
            </div>
            <div class="form-group mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="content...">{{ $post->content }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="image" class="form-label">Image</label>
                <input value="{{ $post->image }}" type="text" name="image" class="form-control" id="image"
                       placeholder="image...">
            </div>
            <div class="form-group mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category_id ? 'selected' : '' }}
                            value="{{ $category->id }}"
                        >
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple aria-label="multiple select example">
                    @foreach($tags as $tag)
                        <option
                            {{ $post->tags->pluck('id')->contains($tag->id) ? 'selected' : ''}}
                            value="{{$tag->id}}"
                        >
                            {{$tag->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
