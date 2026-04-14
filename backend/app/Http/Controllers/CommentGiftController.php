<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CommentGift;
use Illuminate\Support\Facades\Auth;

class CommentGiftController extends Controller {
    public function send(Request $request) {
        $data = $request->validate([
            'comment_id'=>'required|exists:comments,id',
            'gift_type'=>'required|string',
            'amount'=>'required|integer|min:1',
            'is_paid'=>'boolean'
        ]);
        $gift = CommentGift::create([
            'comment_id'=>$data['comment_id'],
            'user_id'=>Auth::id(),
            'gift_type'=>$data['gift_type'],
            'amount'=>$data['amount'],
            'is_paid'=>$data['is_paid'] ?? false
        ]);
        return response()->json($gift);
    }
}
