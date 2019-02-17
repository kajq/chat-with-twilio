<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;
use Twilio\Rest\Client;

class Channel extends Model
{
    //Contructor carga las credenciales para conectarse al API de Twilio
    function __construct()
    {
        $this->TWILIO_ACCOUNT_SID   = 'AC43ef1f157f97056a8431b1e8dd9b6470';
        $this->TWILIO_TOKEN         = '5e96d1fda8437ecc7df1839218c20496';  
        $this->twilio               = new Client($this->TWILIO_ACCOUNT_SID, $this->TWILIO_TOKEN);
        $this->TWILIO_SERVICE       = $this->GetService();
    }
    //Función que consulta el servicio
    public function GetService(){
        $services = $this->twilio->chat->v2->services
                        ->read();
        $service_id = $services[0]->sid;

        return $service_id;
    }
    //Función para obtener todos los canales
    public function getChannels()
    {
        $channels = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                                    ->channels
                                    ->read();

        return $channels;
    }
    //Función que obtiene la información de un solo canal
    public function getChannel($sid){
        $channel = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels($sid)
                            ->fetch();

        return $channel;
    }
    //Función para crear un canal
    public function postChannel($pChannelName){
        $channel = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels
                            ->create(array("friendlyName" => $pChannelName));
    }
    //Función para actualizar un canal
    public function updateChannel($sid, $pChannelName){
        $channel = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels($sid)
                            ->update(array(
                                         "friendlyName" => $pChannelName
                                     )
                            );
    }
    //Función para eliminar un canal
    public function deleteChannel($sid)
    {
        $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                 ->channels($sid)
                 ->delete();
    }
}
