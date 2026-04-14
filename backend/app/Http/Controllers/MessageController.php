<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request) {
        $userId = $request->user()->id;
        $text = $request->input('text');
        // AI moderation
        $result = \App\Services\ModerationService::autoModerateUser($userId, $text);
        if ($result === 'spam') {
            return response()->json(['error'=>'Message flagged by moderation.'], 403);
        }
        // Assume Message model exists, or adapt
        $msg = \App\Models\Message::create([
            'from_id' => $userId,
            'to_id' => $request->input('to_id'),
            'text' => $text,
        ]);
        return response()->json($msg, 201);
    }
}
