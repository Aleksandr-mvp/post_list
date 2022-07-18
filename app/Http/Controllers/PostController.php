<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\PostService;

class PostController extends Controller
{
    public $postService;

    public function __construct(PostService $postService){
        $this->postService = $postService;
    }

    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);



//        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $post = $this->postService->storePost($data);

        return new PostResource($post);

//        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->postService->updatePost($data, $post);

        return new PostResource($post);

//        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }










    public function delete()
    {
        $post = Post::find(6);
        $post->delete();

//        // Удаление не полное, в базе остаётся
//        $post = Post::withoutTrashed()->find(6);
//        $post->restore();

        dd('deleted');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => '$another post',
            'content' => 'some content post',
            'image' => 'imag.jpg',
            'likes' => 476,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            [
                'title' => 'another post',
            ],
            'title' => 'another post',
            'content' => 'some content post',
            'image' => 'imag.jpg',
            'likes' => 476,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }
}
