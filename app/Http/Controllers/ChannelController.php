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
        $channel = $this->channel->getChannel($sid);
        return view('channels.edit', compact('channel'));
    }

    public function updateChannel(Request $request)
    {
        $sid = $request->sid;
        $channelname = $request->channelname;

        $this->channel->updateChannel($sid, $channelname);
        
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
