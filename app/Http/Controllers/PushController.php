<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendPushNotification;


class PushController extends Controller
{
    public function push (Request $request) {
        dispatch(new SendPushNotification($request->input('animal'), $request->input('token')));        

        return response()->json("ok", 200);
    }
}
