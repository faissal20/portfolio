<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Statistics;
use App\Models\OurStatistic;
use Illuminate\Http\Request;
use App\Services\ArrayServices;
use App\Http\Controllers\Controller;
use App\Http\Resources\StatisticsResource;
use Illuminate\Http\Exceptions\HttpResponseException;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        $statistics = Statistics::all();
        return StatisticsResource::collection($statistics);
    }

    public function show(Request $request)
    {
        $user = $request->user();
        $statistics = $user->statistics;
        if(!$statistics) {
            throw new HttpResponseException(response()->json([
                'error' => true,
                'message' => 'Statistics not found!'
            ], 404));
        }
        return new StatisticsResource($statistics);
    }

    public function showByUsername(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $statistics = $user->statistics;
        if(!$statistics) {
            throw new HttpResponseException(response()->json([
                'error' => true,
                'message' => 'Statistics not found!'
            ], 404));
        }
        return new StatisticsResource($statistics);
    }

    public function store(Request $request)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => 'Method not allowed'
        ], 405));
    }


    public function update(Request $request)
    {
        $request->validate([
            'heartStorage' => 'integer|max:100|min:0',
            'knowledge' => 'integer|max:100|min:0',
            'happiness' => 'integer|max:100|min:0',
            'missing' => 'integer|max:100|min:0',
            'madeForEachOther' => 'integer|max:100|min:0',
        ]);
        $data = ArrayServices::convertKeysToSnakeCase($request->all());
        $user = $request->user();

        if(!$user) {
            throw new HttpResponseException(response()->json([
                'error' => true,
                'message' => 'User not found!'
            ], 404));
        }
        
        $user->statistics()->update($data);

        return response()->json([
            'error' => false,
            'message' => 'the statistics has been updated successfully!',
        ]);
    }

    public function destroy(Request $request, $id)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => 'Method not allowed'
        ], 405));
    }

}
