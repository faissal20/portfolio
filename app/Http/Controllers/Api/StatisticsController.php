<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OurStatistic;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $statistics = OurStatistic::where('user_id', $user->id)->get();

        return response()->json([
            'message' => 'success',
            'data' => $statistics
        ]);
    }

    public function show(Request $request, $id)
    {
        $user = $request->user();
        $statistics = OurStatistic::where('user_id', $user->id)->where('id', $id)->first();

        return response()->json([
            'message' => 'success',
            'data' => $statistics
        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $data = $request->all();
        $data['user_id'] = $user->id;

        $statistics = OurStatistic::create($data);

        return response()->json([
            'message' => 'success',
            'data' => $statistics
        ]);
    }


    public function update(Request $request)
    {
        $user = $request->user();
        $data = $request->all();

        $user->statistics->update($data);

        return response()->json([
            'message' => 'success',
        ]);
    }

}
