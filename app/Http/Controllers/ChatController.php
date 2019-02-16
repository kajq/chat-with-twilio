<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->channel = new Channel();
    }

    public function index()
    {
        $channels = $this->channel->getChannels();
        return view('chat.index', compact('channels'));
    }
}
