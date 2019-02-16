<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;
use Twilio\Rest\Client;

class Channel extends Model
{
    function __construct()
    {
        $this->TWILIO_ACCOUNT_SID   = 'AC43ef1f157f97056a8431b1e8dd9b6470'; // env('TWILIO_ACCOUNT_SID');
        $this->TWILIO_TOKEN         = '5e96d1fda8437ecc7df1839218c20496';    //env('TWILIO_TOKEN');
        $this->TWILIO_SERVICE       = 'IS8ff2da4c75fe481b87519e39a71ff068';// env('TWILIO_SERVICE');
        $this->twilio               = new Client($this->TWILIO_ACCOUNT_SID, $this->TWILIO_TOKEN);
        
    }

    public function getChannels()
    {
        $channels = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                                    ->channels
                                    ->read();

        return $channels;
    }

    public function postChannel($pChannelName){
        $channel = $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels
                            ->create(array("friendlyName" => $pChannelName));
    }

    public function updateChannel($sid, $pChannelName){
        $channel = $twilio->chat->v2->services($this->TWILIO_SERVICE)
                            ->channels($sid)
                            ->update(array(
                                         "friendlyName" => $pChannelName
                                     )
                            );
    }

    public function deleteChannel($sid)
    {
        $this->twilio->chat->v2->services($this->TWILIO_SERVICE)
                 ->channels($sid)
                 ->delete();
    }
}
