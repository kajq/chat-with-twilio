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

    public function editChannel(Request $request)
    {
        $sid = $request->sid; 
        return view('channels.edit', compact('channels'));
    }

    public function updateChannel(Request $request)
    {
        $sid = $request->sid;
        $channelname = $request->channelname;
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }

    public function deleteChannel(Request $request)
    {
        $id = $request->sid; 
        $channels = $this->channel->deleteChannel($id);
        $channels = $this->channel->getChannels();
        return view('channels.index', compact('channels'));
    }
}
