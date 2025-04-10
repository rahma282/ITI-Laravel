<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(5);

        $posts->getCollection()->transform(function ($post) {
            $post->formatted_date = Carbon::parse($post->created_at)->format('d-m-y');
            return $post;
        });

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        //dd($users);
        return view('posts.create', compact('users'));

    }
    public function store(StorePostRequest $request)
    {
        //validation
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        //dd($request->all());
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator,
            'slug' => Str::slug($request->title),
            'image' => $imagePath
        ]);

        return to_route('posts.index');
    }

    public function show($id)
    {
        $post = Post::with('comments.user')->findOrFail($id);
        $users = User::all();
        return view('posts.show', compact('post', 'users'));
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));

    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('posts', 'public');
        }


        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->creator,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
        ]);
        //dd($request->creator);
        //dd($post);
        return to_route('posts.index');
    }
    public function destroy(Post $post)
    {
        Comment::where('commentable_id', $post->id)
            ->where('commentable_type', Post::class)->delete();

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }


        $post->delete();

        return to_route('posts.index');
    }
}
