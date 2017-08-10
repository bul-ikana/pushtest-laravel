<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class PushController extends Controller
{
    public function push (Request $request) {
        $token = $request->input('token');
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $notificationBuilder = new PayloadNotificationBuilder;

        switch ($request->input('animal')) {
            case "cat":
                $notificationBuilder
                    ->setTitle('Cat')
                    ->setBody('Meow!')
                    ->setIcon('cat_black')
                    ->setColor('#ffab00')
                    ->setSound('default');
            break;

            case "cow":
                $notificationBuilder
                    ->setTitle('Cow')
                    ->setBody('Moo!')
                    ->setIcon('cow_black')
                    ->setColor('#aeaeaf')
                    ->setSound('default');
            break;

            case "dog":
                $notificationBuilder
                    ->setTitle('Dog')
                    ->setBody('Woof!')
                    ->setIcon('dog_black')
                    ->setColor('#b19267')
                    ->setSound('default');
            break;

            case "duck":
                $notificationBuilder
                    ->setTitle('Duck')
                    ->setBody('Quack!')
                    ->setIcon('duck_black')
                    ->setColor('#bd7f00')
                    ->setSound('default');
            break;

            case "pig":
                $notificationBuilder
                    ->setTitle('Pig')
                    ->setBody('Oink!')
                    ->setIcon('pig_black')
                    ->setColor('#d37b93')
                    ->setSound('default');
            break;

            default:
                $notificationBuilder
                    ->setTitle('Animal')
                    ->setBody('A wild animal has appeared!')
                    ->setSound('default');
            break;
        }

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $downstreamResponse = FCM::sendTo($token, $option, $notification);

        return response()->json($downstreamResponse, 200);
    }
}
