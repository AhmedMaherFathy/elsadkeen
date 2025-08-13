<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportMessageRequest;
use App\Http\Resources\SupportMessageResource;
use App\Models\SupportChat;
use App\Models\SupportMessage;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SupportChatController extends Controller
{
    use HttpResponse;

    public function sendMessage(SupportMessageRequest $request)
    {
        $user = auth()->user();

        $validated = $request->validated();

        SupportMessage::create([
            'user_id' => $user->id,
            'message' => $validated['message'],
            'type'    => 'user'
        ]);

        return $this->successResponse(message: __('user.message_sent_successfully'));
    }

    public function getMessages()
    {
        $user = auth()->user();
        SupportMessage::where('user_id', $user->id)->update(['user_seen_at' => now()]);
        $messages = SupportMessage::where('user_id',$user->id)->paginate();

        return $this->paginatedResponse($messages, SupportMessageResource::class);
    }
}
