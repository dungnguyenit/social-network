<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\DB as FacadesDB;
use App\PostMedia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getPosts()
    {
        $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('post_media', 'posts.id', '=', 'post_media.post_id')
            ->selectRaw('posts.*,users.id as user_id,post_media.id as post_media_id, users.name, post_media.media_url,post_media.post_id')
            // ->groupBy('post_id')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $result = [];
        foreach ($posts as $post) {
            $result[$post->id][] = $post;
        }
        return view('home', ['posts' => $result]);
    }
}
