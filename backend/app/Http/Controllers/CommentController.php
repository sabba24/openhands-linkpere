<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Services\ModerationService;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $userId = $request->user()->id;
        $text = $request->input('text');
        $postId = $request->input('post_id');
        // AI moderation
        $result = ModerationService::autoModerateUser($userId, $text);
        if ($result === 'spam') {
            return response()->json(['error' => 'Comment flagged by moderation.'], 403);
        }
        $comment = Comment::create([
            'user_id' => $userId,
            'post_id' => $postId,
            'text' => $text,
        ]);
        return response()->json($comment, 201);
    }
}
