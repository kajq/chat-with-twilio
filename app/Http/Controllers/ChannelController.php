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
        dd($this->channel->getChannels);
    }
}
