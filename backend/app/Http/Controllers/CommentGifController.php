<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CommentGif;
use Illuminate\Support\Facades\Auth;

class CommentGifController extends Controller {
    public function send(Request $request) {
        $data = $request->validate([
            'comment_id'=>'required|exists:comments,id',
            'gif_url'=>'required|url'
        ]);
        $cg = CommentGif::create([
            'comment_id'=>$data['comment_id'],
            'user_id'=>Auth::id(),
            'gif_url'=>$data['gif_url']
        ]);
        return response()->json($cg);
    }
}
