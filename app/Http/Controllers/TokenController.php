<?php

namespace App\Http\Controllers;
//require_once '/path/to/vendor/autoload.php';

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function generate(Request $request, AccessToken $accessToken, ChatGrant $chatGrant)
    {
        $appName = "TwilioChat";
        $deviceId = $request->input("device");
        $identity = $request->input("identity");

        $TWILIO_CHAT_SERVICE_SID = config('services.twilio')['chatServiceSid'];

        $endpointId = $appName . ":" . $identity . ":" . $deviceId;

        $accessToken->setIdentity($identity);

        $chatGrant->setServiceSid($TWILIO_CHAT_SERVICE_SID);
        $chatGrant->setEndpointId($endpointId);

        $accessToken->addGrant($chatGrant);

        $response = array(
            'identity' => $identity,
            'token' => $accessToken->toJWT()
        );

        return response()->json($response);
    }

    public function index()
    {
        $sid    = "AC43ef1f157f97056a8431b1e8dd9b6470";
        $token  = "5e96d1fda8437ecc7df1839218c20496";
        $twilio = new Client($sid, $token);

        $channels = $twilio->chat->v2->services("IS8ff2da4c75fe481b87519e39a71ff068")
                                    ->channels
                                    ->read();

        foreach ($channels as $record) {
            $channel = $twilio->chat->v2->services("IS8ff2da4c75fe481b87519e39a71ff068")
                            ->channels($record->sid)
                            ->fetch();

            /*print($channel->friendlyName);
            echo "; ";*/
        }
        
        return view('channels.index', compact('channels','channel'));
    }
}
