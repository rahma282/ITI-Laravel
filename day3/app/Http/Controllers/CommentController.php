<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
    public function create()
    {
        $users = User::all();
        //dd($users);
        return view('posts.create', compact('users'));

    }
    public function store(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $post->comments()->create([
            //dd($request->all()),
            'user_id' => $request->creator,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added!');
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted.');
    }

    public function edit(Comment $comment)
    {
        $users = User::all();
        return view('comments.edit', compact('comment', 'users'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'comment' => $request->comment,
            'user_id' => $request->creator,
        ]);
        return redirect()->route('posts.show', $comment->commentable->id)
        ->with('success', 'Comment updated!');
    }
}
