<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::ordered()->paginate(20);
        $unread_count = Message::unread()->count();
        return view('admin.messages.index', compact('messages', 'unread_count'));
    }

    public function show(Message $message)
    {
        if (!$message->is_read) {
            $message->markAsRead();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message supprimé');
    }

    public function markAsRead(Message $message)
    {
        $message->markAsRead();
        return redirect()->back()->with('success', 'Marqué comme lu');
    }
}
