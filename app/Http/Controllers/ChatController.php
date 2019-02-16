<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Chat;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->chat = new Chat();
        $this->channel = new Channel();
        $this->member = null;
    }

    public function index()
    {
        $channels = $this->channel->getChannels();
        return view('chat.index', compact('channels'));
    }

    public function login($sid){
        $channel = $this->channel->getChannel($sid);
        return view('chat.login', compact('channel'));
    }

    public function room($sid)
    {   
        if ($this->member <>  null)
        {
            $this->member = $this->chat->GetMember($sid); 
        } 
        $channel = $this->channel->getChannel($sid);
        $members = $this->chat->GetMembers($sid);
        return view('chat.room', compact('channel', 'members', 'member'));
    }

    public function valide_user(Request $request)
    {
        $sid = $request->sid; 
        $name = $request->name; 
        $exist = false;
        $channel = $this->channel->getChannel($sid);
        $members = $this->chat->GetMembers($sid);
        //recorremos los usuarios del canal
        foreach ($members as $record) {
            if($record->identity == $name){
                //si lo encontramos respaldamos el nombre y rompemos el recorrido
                $id_member = $record->sid;
                $exist = true;
                break;
            }
        }

        if ($exist == false){
            //si no lo encuentra creacmos el usuario
            $member = $this->chat->PostMember($sid, $name);
        } else {
            //si lo encuentra obiente los datos del usuario
            $member = $this->chat->GetMember($sid, $id_member);
        }
        
        //dd($member);

        return view('chat.room', compact('channel', 'members', 'member'));
    }
}
