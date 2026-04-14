<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CommentVoiceNote;
use Illuminate\Support\Facades\Auth;

class CommentVoiceNoteController extends Controller {
    public function send(Request $request) {
        $data = $request->validate([
            'comment_id'=>'required|exists:comments,id',
            'voice_url'=>'required|url'
        ]);
        $note = CommentVoiceNote::create([
            'comment_id'=>$data['comment_id'],
            'user_id'=>Auth::id(),
            'voice_url'=>$data['voice_url']
        ]);
        return response()->json($note);
    }
}
