# Laravel push - backend

A simple example of using [brozot/Laravel-FCM](https://github.com/brozot/Laravel-FCM) with[Laravel](https://laravel.com/) to send push notifications to mobile devices through FCM.

## About 

This project sends a push notification to mobile devices upon request. Once installed, a `GET`request to `http://[project root]/api/push?animal=[animal]&token=[FCM token]` will send a push notification to the device whose FCM token was provided. 

The notification job will be sent to the queue and processed eventually by the queue worker. This speeds up web requests as sending of notifications is processed asynchronously. If you want to send the notification immediately after processing the request, check the `simple-motification` tag of this repo, which uses no queues.

A different notification will be sent depending on the animal parameter. The available animals are:

* cat
* cow
* dog
* duck
* pig

Any other animal will send a default notification.

It is easier to test, and intended to be used with [pushtest-android](https://github.com/bul-ikana/pushtest-android).

## Running the project

* Make sure you have Laravel ready development or staging environment. [Homestead](https://laravel.com/docs/master/homestead) is a great option, but not the only one
<<<<<<< HEAD
* Create a Firebase project in the [Firebase console](https://console.firebase.google.com/). You will need a server key and a sender ID.
* Clone the repo
* Install dependencies running `composer install`
* Configure your [environment](https://laravel.com/docs/5.4/configuration#environment-configuration) in the .env file. Don't forget to add your Firebase data.
=======
* Create a Firebase project in the [Firebase console](https://console.firebase.google.com/). You will need a server key and a sender ID
* Clone the repo
* Install dependencies running `composer install`
* Configure your [environment](https://laravel.com/docs/5.4/configuration#environment-configuration) in the .env file. Don't forget to add your Firebase data. If you want to change the queue driver, this is the place
* Run migrations by running `php artisan migrate`
* Run the queue worker by running `php artisan queue:work`. Keep in mind jobs will only be processed while this process is running, so you may want to keep it running using [Supervisor](https://laravel.com/docs/5.1/queues#supervisor-configuration) or some tool like that
>>>>>>> queue
* Done. Everything is ready to start accepting request and sending notifications to devices

## Questions?
Please feel free to raise an issue in our issue page.