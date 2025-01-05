<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($id);

        $post->comments()->create([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', $id)->with('success', 'Коментар успішно додано!');
    }
}


