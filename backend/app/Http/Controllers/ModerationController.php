<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FlaggedUser;
use App\Services\ModerationService;
class ModerationController extends Controller {
    public function flaggedUsers(Request $request) {
        $flagged = FlaggedUser::with('user')->latest()->paginate(30);
        return response()->json($flagged);
    }
    public function review($id) {
        $item = FlaggedUser::findOrFail($id);
        $item->status = 'reviewed';
        $item->save();
        return response()->json($item);
    }
    public function approve($id) {
        $item = FlaggedUser::findOrFail($id);
        $item->status = 'approved';
        $item->save();
        return response()->json($item);
    }
    public function ban($id) {
        $item = FlaggedUser::findOrFail($id);
        $item->status = 'banned';
        $item->user->status = 'banned';
        $item->user->save();
        $item->save();
        return response()->json($item);
    }
}
