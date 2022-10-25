<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Events\MessageSent;

class ChatsController extends Controller
{
    public function index()
    {
        $user = Auth::user()->toArray();
        return Inertia::render('chat',['user'=>$user]);
    }

    public function fetchMessages()
    {
    return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => $request->input('message')
    ]);

    event(new MessageSent($user,  $message->load('user'), 1));

    return ['status' => 'Message Sent!'];
    }

    public function destroy($id)
    {


        $delete= Message::find($id)->delete();
        
        event(new MessageSent($id,  $delete, 0));
        return ['status' => 'Message Delete!'];
       
        
    }
}
