<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Buku;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function komentar(Request $request, $id)
    {
    $buku = Buku::find($id);

    $post           = new Post;
    $post->user_id  = Auth::user()->id;
    $post->book_id  = $buku->id;
    $post->comment  = $request->comment;
    $post->save();
    return back();
    }
}