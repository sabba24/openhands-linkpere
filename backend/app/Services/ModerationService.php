<?php
namespace App\Services;
use App\Models\FlaggedUser;
use App\Models\User;
use Illuminate\Support\Facades\Http;
class ModerationService {
    public static function moderateText($text) {
        // basic spam/bot heuristics
        $patterns = [
            '/free\s+followers/i', '/http\S+/', '/buy\s+now/i', '/visit\s+my\s+site/i',
            '/\b[a-z]{12,}\b/' // suspicious long words
        ];
        foreach ($patterns as $pat) if (preg_match($pat, $text)) return 'spam';

        // ChatGPT moderation
        $resp = Http::withHeaders([
            'Authorization'=>'Bearer '.env('OPENAI_API_KEY')
        ])->post(
            'https://api.openai.com/v1/chat/completions', [
                'model'=>'gpt-3.5-turbo',
                'messages'=>[
                    ['role'=>'system','content'=>'Detect spam, bots, or harmful text'],
                    ['role'=>'user','content'=>$text]
                ],
                'max_tokens'=>2
            ]);
        if (isset($resp['choices'][0]['message']['content']) &&
            stripos($resp['choices'][0]['message']['content'],'spam') !== false)
            return 'spam';

        // Gemini moderation
        $geminiKey = env('GEMINI_API_KEY');
        if ($geminiKey) {
            $gemini = Http::withHeaders(['Authorization'=>'Bearer '.$geminiKey])
                ->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent', [
                    'contents' => [[ 'role'=>'user', 'parts'=>[['text'=>$text]] ]],
                ]);
            if (strpos(json_encode($gemini), 'spam') !== false) return 'spam';
        }

        return 'ok';
    }
    public static function flagUser($userId, $reason, $details=null) {
        return FlaggedUser::create([
            'user_id'=>$userId,
            'reason'=>$reason,
            'details'=>$details,
        ]);
    }
    public static function autoModerateUser($userId, $text) {
        $result = self::moderateText($text);
        if ($result==='spam') self::flagUser($userId, $result, $text);
        return $result;
    }
}