<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AlgorithmConfig;
use App\Models\Post;

class FeedController extends Controller
{
    public function feed(Request $request) {
        $cfg = AlgorithmConfig::current();
        $posts = Post::query();
        // Example ranking using weights
        $posts = $posts->orderByRaw('((engagement_count * ?) + (view_count * ?)) DESC', [
            $cfg->engagement_weight, $cfg->view_boost_multiplier
        ]);
        if ($cfg->ranking_formula !== 'default') {
            // For custom formulas (simple demo, replace as needed)
            $posts = $posts->orderByRaw($cfg->ranking_formula);
        }
        $feed = $posts->paginate(30);
        return response()->json($feed);
    }
}
