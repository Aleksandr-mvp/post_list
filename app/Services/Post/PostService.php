<?php

namespace App\Services\Post;

use App\Models\Post;

class PostService
{
    public function storePost($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        $post->tags()->attach($tags);

        return $post;
    }

    public function updatePost($data, $post)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return $post->fresh();
    }
}
