<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\http\Request;
use twilio\Rest\client as Twilio;


class Channel extends Model
{
    function __construct()
    {
        $this->TWILIO_ACCOUNT_SID   = env('TWILIO_ACCOUNT_SID');
        $this->TWILIO_TOKEN         = env('TWILIO_TOKEN');
        $this->TWILIO_SERVICE       = env('TWILIO_SERVICE');
        $this->TWILIO               = new Twilio($this->TWILIO_ACCOUNT_SID, $this->TWILIO_TOKEN);
        
    }

    public function getChannels()
    {
        $channels = $this->TWILIO->chat->v2->services($this->TWILIO_SERVICE)
                                    ->channels
                                    ->read();

        return $channels;
    }
}
