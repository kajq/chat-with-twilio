<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Twilio\Jwt\AccessToken;

class TwilioAccessTokenProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AccessToken::class, function ($app) {
                $TWILIO_ACCOUNT_SID = config('services.twilio')['AC43ef1f157f97056a8431b1e8dd9b6470'];
                $TWILIO_API_KEY = config('services.twilio')['SK535843ae599995582c36f20ce8ba07c6'];
                $TWILIO_API_SECRET = config('services.twilio')['vJAb0fYtUDsltK69wxveOYm0EbGcXEk2'];

                $token = new AccessToken(
                    $TWILIO_ACCOUNT_SID,
                    $TWILIO_API_KEY,
                    $TWILIO_API_SECRET,
                    3600
                );

                return $token;
            }
        );
    }
}
