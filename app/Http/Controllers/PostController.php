<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $posts = Post::where('title', 'like', '%' . $search . '%')->paginate(6);
        } else {
            $posts = Post::paginate(6);
        }

        if ($request->ajax()) {
            return response()->json([
                'posts' => view('partials.posts', compact('posts'))->render(),
                'pagination' => (string) $posts->links()
            ]);
        }
        return view('posts', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('post', compact('post'));
    }
}




