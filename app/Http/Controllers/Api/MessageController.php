<?php

namespace App\Http\Controllers\Api;

use App\Events\NewMessage;
use App\Http\Requests\Messages\StoreRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Chat\MessageResource;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $messages  = Message::with(['from', 'to'])->orderBy('created_at', 'asc')->get();
        return [
            'data' => $messages,
        ];
        // return MessageResource::collection($messages);    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $from = $request->user()->id ?? 2;
        $to = $data['to'];
        
        $message = Message::create([
            'from' => $from,
            'to' => $data['to'],
            'content' => $data['content'],
            'type' => 'text', // for now we only support text messages
            'seen' => false,
        ]);

        NewMessage::dispatch($message);

        return [
            'data' => $message->load(['from', 'to']),
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
