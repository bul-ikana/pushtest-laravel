<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


use FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SendPushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $animal;
    protected $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($animal, $token)
    {
        $this->animal = $animal;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder;

        switch ($this->animal) {
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
        FCM::sendTo($this->token, $option, $notification);
    }
}
