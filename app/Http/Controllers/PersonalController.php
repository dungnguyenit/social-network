<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class PersonalController extends Controller
{

    public function index($id = null)
    {
        $userId = $id ? $id : Auth::id();
        $userInfo = DB::table('users')->select('*')->where('id', $userId)->first();
        $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('post_media', 'posts.id', '=', 'post_media.post_id')
            ->where('posts.user_id', $userId)
            ->selectRaw('posts.*,users.id as user_id,post_media.id as post_media_id, users.name, post_media.media_url,post_media.post_id')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $result = [];
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        foreach ($posts as $post) {
            $media_url = isset($post->media_url) ? $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . $post->media_url : null;
            $post->media_url = $media_url;
            $result[$post->id][] = $post;
        }
        return view('personalPage', ['posts' => $result, 'userInfo' => $userInfo]);
    }
    // public function index($id = null)
    // {
    //     $userId = $id ? $id : Auth::id();
    //     $userInfo = DB::table('users')->select('*')->where('id', $userId)->first();
    //     $posts = DB::table('posts')
    //         ->leftJoin('users', 'posts.user_id', '=', 'users.id')
    //         ->leftJoin('post_media', 'posts.id', '=', 'post_media.post_id')
    //         ->where('posts.user_id', $userId)
    //         ->selectRaw('posts.*,users.id as user_id,post_media.id as post_media_id, users.name, post_media.media_url,post_media.post_id')
    //         ->orderBy('posts.created_at', 'desc')
    //         ->get();
    //     $result = [];
    //     $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
    //     foreach ($posts as $post) {
    //         $media_url = isset($post->media_url) ? $protocol . "://" . $_SERVER['HTTP_HOST'] . "/" . $post->media_url : null;
    //         $post->media_url = $media_url;
    //         $result[$post->id][] = $post;
    //     }

    //     return response()->json(['posts' => $result, 'userInfo' => $userInfo]);
    // }
}
