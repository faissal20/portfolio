<?php 

namespace App\Services;

use App\Models\SystemLog;

class LogServices {

    public static function getLogs($filters = null){
        $logs = SystemLog::with('user')->orderBy('created_at', 'desc');
        if($filters){
            $logs->where($filters);
        }
        return $logs->get();
    }
    public static function store($request, $type, $data, $user = null){
        $user = $user ?? $request->user();
        $ip = $request->ip();
        $user_agent = $request->header('User-Agent');
        $data = array_merge($data, ['ip' => $ip, 'user_agent' => $user_agent]);
        $user->logs()->create([
            'type' => $type,
            'data' => $data,
        ]);
    }
}