<?php

namespace App\Http\Controllers\Api;

use App\Models\statistics;
use App\Models\DailyMessage;
use App\Models\OurStatistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $messages = DailyMessage::where('date', now()->format('Y-m-d'))->get();

        return response()->json([
            'dailyMessage' => $messages,
            'statistics' => OurStatistic::where('user_id', auth()->user()->id)->first(),
        ]);
    }

    public function leaveMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        statistics::forceCreate([
            'action_type' => 'leave_message',
            'action_by' => auth()->user()->username,
            'action_data' => json_encode(['message' => $request->message])
        ]);

        return response()->json(['message' => 'Message has been saved!']);
    }

}
