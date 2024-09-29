<?php

use App\Mail\MailContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("send-notificaton",function(){

    try{
        event(new \App\Events\NotificationEvent('herllo'));
    }catch(Exception $ex)
    {
        return $ex->getMessage();
    }

    return "success";

});
