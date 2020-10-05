<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Str;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        return view('landing', [
            'posts' => Post::latest()->paginate(5)
        ]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Post $post)
    {
        return view('single', compact('post'));
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PostResource::collection(Post::latest()->paginate(5));
    }



    /**
     * @param Request $request
     * @return PostResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $post = new Post;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/posts');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $post->image = $name;
        }

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return new PostResource($post);
    }


    /**
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }


    /**
     * @param Request $request
     * @param Post $post
     * @return PostResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->only(['title', 'body']));

        return new PostResource($post);
    }


    /**
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
