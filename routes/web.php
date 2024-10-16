<?php

use App\Events\TaskStatusUpdated;
use App\Notifications\NewVisitor;
use App\Notifications\TelegramNotif;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

app()->bind('contoh', function () {
    return new \App\Tabungan;
});

// app()->singleton('contoh', function (){
//     return new \App\Tabungan;
// });


class Task
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}

Route::get('/', function () {
    TaskStatusUpdated::dispatch(new Task(1));

    $user =  Auth::user();
    // $user->notify(new NewVisitor("Welcome {$user->name}"));
    if (Auth::check()) {
        Notification::send($user, new NewVisitor("Welcome {$user->name}"));
        // $user->notify(new TelegramNotif());
        // https://stackoverflow.com/questions/32423837/telegram-bot-how-to-get-a-group-chat-id
        Notification::send($user, new TelegramNotif());
    }
    return view('welcome');
    // dd(app('contoh'), app('contoh'));
});

Route::get('/update', function () {

    TaskStatusUpdated::dispatch(new Task(10));
});

Route::get('/email/send', 'SendMailController@sendMail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
