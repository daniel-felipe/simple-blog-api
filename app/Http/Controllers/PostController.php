<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(
            Post::with(['author', 'tag'])->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $request->validated();

        try {
            if ($request->hasFile('thumbnail')) {
                $path = $request->file('thumbnail')->store('public/thumbnails');
            }

            $post = Post::create([
                'title' => $request->title,
                'slug' => str()->slug($request->title),
                'thumbnail' => $path ?? 'default.png',
                'user_id' => $request->user_id,
                'tag_id' => $request->tag_id,
            ]);

            return new PostResource($post);
        } catch (\Exception $e) {
            throw new HttpException(
                Response::HTTP_BAD_REQUEST,
                'Cannot save new post: ' . $e->getMessage()
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $request->validated();

        try {
            $post->update([
                'title' => $request->title,
                'slug' => str()->slug($request->title),
                'user_id' => $request->user_id,
                'tag_id' => $request->tag_id,
            ]);

            if ($request->hasFile('thumbnail')) {
                $path = $request->file('thumbnail')->store('public/thumbnails');

                $post->update([
                    'thumbnail' => $path,
                ]);
            }

            return new PostResource($post);
        } catch (\Exception $e) {
            throw new HttpException(
                Response::HTTP_BAD_REQUEST,
                'Cannot edit post: ' . $e->getMessage(),
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['data' => true]);
    }
}
