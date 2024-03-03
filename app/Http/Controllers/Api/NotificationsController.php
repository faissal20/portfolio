<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\LogServices;
use App\Http\Controllers\Controller;
use App\Http\Resources\LogResource;

class NotificationsController extends Controller
{
    
    public function showLogs(Request $request)
    {
        $logs = LogServices::getLogs();
        return LogResource::collection($logs);
    }
}
