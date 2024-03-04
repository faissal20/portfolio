<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyMessage;
use App\Models\Reply;
use App\Services\LogServices;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index(Request $request){
        return Reply::orderBy('id', 'desc')->get();
    }

    public function store(Request $request, DailyMessage $daily_message)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $daily_message->seen = true;
        $daily_message->seen_at = date('Y-m-d H:m:s');
        $daily_message->save();

        $daily_message->replies()->create([
            'reply' => $request->message,
            'user_id' => $request->user()->id,
        ]);

        LogServices::store($request, 'reply', ['message' => $daily_message->id] );
        
        return response()->json(['message' => 'Reply has been saved!']);
    }
}
