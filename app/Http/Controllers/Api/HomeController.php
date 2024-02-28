<?php

namespace App\Http\Controllers\Api;

use App\Models\DailyMessage;
use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DailyMessageResource;
use App\Http\Resources\StatisticsResource;
use App\Models\SystemLog;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $messages = DailyMessage::where('date', now()->format('Y-m-d'))->get();

        return DailyMessageResource::collection($messages);

    }

}
