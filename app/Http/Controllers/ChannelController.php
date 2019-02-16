<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->channel = new Channel();
    }

    public function index()
    {
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }

    public function createChannel(Request $request)
    {
        $channelname = $request->channelname; 
        $channels = $this->channel->postChannel($channelname);
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }
}
