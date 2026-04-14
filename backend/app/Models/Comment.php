<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function gifts() { return $this->hasMany(CommentGift::class); }
    public function voiceNote() { return $this->hasOne(CommentVoiceNote::class); }
    public function gif() { return $this->hasOne(CommentGif::class); }
    public function emojiReactions() { return $this->hasMany(CommentEmojiReaction::class); }
    //
}
