<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;

class Chat extends Model
{
    //Contructor carga las credenciales para conectarse al API de Twilio
    function __construct()
    {
        $this->TWILIO_ACCOUNT_SID   = 'AC43ef1f157f97056a8431b1e8dd9b6470'; // env('TWILIO_ACCOUNT_SID');
        $this->TWILIO_TOKEN         = '5e96d1fda8437ecc7df1839218c20496';    //env('TWILIO_TOKEN');
        $this->TWILIO_SERVICE       = 'IS8ff2da4c75fe481b87519e39a71ff068';// env('TWILIO_SERVICE');
        $this->twilio               = new Client($this->TWILIO_ACCOUNT_SID, $this->TWILIO_TOKEN);
    }
    //Función que retorna los miembros de un servicio
    public function GetMembers($sid){
        $members = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels($sid)
                            ->members
                            ->read();
    return $members;
    }
    //Función que retorna los datos de un solo miembro de un canal
    public function GetMember($sid, $id_member){
        $member = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                           ->channels($sid)
                           ->members($id_member)
                           ->fetch();
        return $member;
    }
    //función que crea un miembro en el canal
    public function PostMember($sid, $name){
        $member = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                           ->channels($sid)
                           ->members
                           ->create($name);
        return $member;
    }
    //Función que obtiene todos los mensajes de un canal
    public function GetMessages($sid){
        $messages = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                             ->channels($sid)
                             ->messages
                             ->read();

        return $messages;
    }
    //Función que envia mensajes a un canal con el propietario
    public function sendMessage($sid_channel, $id_member, $msj){
        $message = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels($sid_channel)
                            ->messages
                            ->create(array("body" => $msj,
                                           "from" => $id_member));
        return $message;
    }
}
