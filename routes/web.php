<?php

use App\Models\statistics;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

    if(cache('temporary')) {
        cache()->forget('temporary');
    }

    return view('login');
});


Route::post('/login', function (Request $request) {

    $request->validate([
        'secret' => 'required|string|in:mxisati,Mxisati,MXISATI,mchisati,Mchisati,MCHISATI'
    ]);

    $ip = $request->ip();
    $user_agent = $request->header('User-Agent');

    statistics::forceCreate([
        'action_type' => 'login',
        'action_taken' => true,
        'action_by' => json_encode(['ip' => $ip, 'user_agent' => $user_agent, 'secret' => $request->secret])
    ]);

    $temporary_code = Str::random(16);


    cache()->put('temporary', $temporary_code, 3600);

    return redirect('/sunflowers');
    
})->name('login');



Route::get('/sunflowers', function(){
    if(cache('temporary')) {
        return view('sunflowers');
    }

    return redirect('/');
})->name('sunflowers');

Route::post('sunflowers', function(Request $request){
    $request->validate([
        'message' => 'required|string'
    ]);

    statistics::forceCreate([
        'action_type' => 'message',
        'action_taken' => true,
        'action_by' => $request->message,
    ]);


    return redirect('/ily');
})->name('sunflowers');


Route::get('/tasnim', function (Request $request) {

    if(cache('temporary')) {
        return view('welcome');
    }

    return redirect('/');
})->name('tasnim');


Route::post('/tasnim', function(Request $request){
    $request->validate([
        'action' => 'string|in:forgive'
    ]);

    statistics::forceCreate([
        'action_type' => 'fogivness',
        'action_taken' => true,
        'action_by' => 'Tasnim'
    ]);

    return redirect('/ily');
})->name('tasnim');


Route::get('/ily', function(){

    if(cache('temporary')) {
        return view('result');
    }   

    return redirect('/');
})->name('ily');


Route::get('/data', function(){
    return statistics::all();
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
