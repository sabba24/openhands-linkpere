<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request) {
        $userId = $request->user()->id;
        $caption = $request->input('caption');
        // AI moderation
        $result = \App\Services\ModerationService::autoModerateUser($userId, $caption);
        if ($result === 'spam') {
            return response()->json(['error'=>'Content flagged by moderation. Awaiting review.'], 403);
        }
        $post = \App\Models\Post::create([
            'user_id' => $userId,
            'caption' => $caption,
            // ... other fields from request if needed
        ]);
        return response()->json($post, 201);
    }
}
