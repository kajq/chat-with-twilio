<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Chat;

class ChatController extends Controller
{   //Constructor que instancia las clases canal y miembros necesarios para funcionar.
    public function __construct()
    {
        $this->chat = new Chat();
        $this->channel = new Channel();
        $this->member = null;
    }
    //Función inicial que carga la vista chat.index, le envia por parametro la lista de canales a mostrar
    public function index()
    {
        $channels = $this->channel->getChannels();
        return view('chat.index', compact('channels'));
    }
    //Función utilizada cuando el usuario intenta ingresar a un chat, redirije la vista a un formulario de login
    public function login($sid){
        $channel = $this->channel->getChannel($sid);
        return view('chat.login', compact('channel'));
    }
    //Función que valida si el nombre de usuario ya esta registrado en el chat, si no lo esta se registra
    public function valide_user(Request $request)
    {
        $sid = $request->sid; 
        $name = $request->name; 
        $exist = false;
        $members = $this->chat->GetMembers($sid);
        //Se recorren los usuarios del canal
        foreach ($members as $record) {
            if($record->identity == $name){
                //si lo encoencuentra se respalda el id y detenemos el recorrido
                $id_member = $record->sid;
                $exist = true;
                break;
            }
        }

        if ($exist == false){
            //si no lo encuentra creamos el usuario
            $member = $this->chat->PostMember($sid, $name);
            $id_member = $member->sid;
        } 
            
        return $this->chatroom($sid, $id_member);
    }
    //Función que creo que no hace nada
   /* public function room($sid)
    {   
        $this->member = $this->chat->GetMember($sid); 
        $channel = $this->channel->getChannel($sid);
        $members = $this->chat->GetMembers($sid);
        return view('chat.room', compact('channel', 'members', 'member'));
    }*/
    //Función que carga la vista chat.room, lugar donde se ven los mensajes del canal y los miembros 
    public function chatroom($sid, $id_member){
        $channel = $this->channel->getChannel($sid);
        $members = $this->chat->GetMembers($sid);
        $member = $this->chat->GetMember($sid, $id_member);
        $messages = $this->chat->GetMessages($sid);
        return view('chat.room', compact('channel', 'members', 'member', 'messages'));
    }
    //Función que envia al modelo los parametros para enviar un mensaje
    public function sendmessage(Request $request)
    {   
        $sid_channel = $request->sid; 
        $msj = $request->msj; 
        $id_member = $request->from;

        $this->chat->sendMessage($sid_channel, $id_member, $msj);
        return $this->chatroom($sid_channel, $id_member);
    }
    //Función que refresca la pantalla manualmente por un botón
    public function refrech(Request $request)
    {
        $id_member  = $request->id_member;
        $sid        = $request->sid;
        //dd($request);
        return $this->chatroom($sid, $id_member);
    }
}
