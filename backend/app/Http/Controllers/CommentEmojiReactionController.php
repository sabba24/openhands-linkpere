<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CommentEmojiReaction;
use Illuminate\Support\Facades\Auth;

class CommentEmojiReactionController extends Controller {
    public function send(Request $request) {
        $data = $request->validate([
            'comment_id'=>'required|exists:comments,id',
            'emoji'=>'required|string'
        ]);
        $react = CommentEmojiReaction::create([
            'comment_id'=>$data['comment_id'],
            'user_id'=>Auth::id(),
            'emoji'=>$data['emoji']
        ]);
        return response()->json($react);
    }
}
