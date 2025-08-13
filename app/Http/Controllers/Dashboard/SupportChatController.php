<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SupportMessage;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SupportChatController extends Controller
{
    use HttpResponse;

    public function index()
    {
        $chats = SupportMessage::select('user_id')
            ->with('user')
            ->groupBy('user_id')
            ->latest()
            ->paginate();
        // return $chats;
        return view('dashboard.support-chats.index', compact('chats'));
    }

    public function show($userId)
    {
        $messages = SupportMessage::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->cursor();
        // return $messages;
        return view('dashboard.support-chats.show', compact('messages', 'userId'));
    }

    public function adminReply(Request $request, $userId)
    {
        // return auth()->guard('admin')->user()->id;
        $request->validate([
            'message' => 'required|string'
        ]);

        SupportMessage::create([
            'user_id' => $userId,
            'admin_id' => auth()->guard('admin')->user()->id,
            'message' => $request->message,
            'type'    => 'admin'
        ]);

        SupportMessage::where('user_id', $userId)
            ->update(['admin_seen_at' => now()]);
        
        return redirect()->route('dashboard.support_chats.show', $userId)
            ->with('success', 'تم إرسال الرسالة بنجاح');
    }
}
