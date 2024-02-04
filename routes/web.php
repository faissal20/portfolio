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


    $temporary_code = Str::random(16);

    statistics::forceCreate([
        'action_type' => 'login',
        'action_taken' => true,
        'action_by' => $request->secret
    ]);

    cache()->put('temporary', $temporary_code, 3600);

    return redirect('/tasnim');
    
})->name('login');


Route::get('/tasnim', function (Request $request) {

    if(cache('temporary')) {
        return view('welcome');
    }

    return redirect('/');
});


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
});


Route::get('/ily', function(){

    if(cache('temporary')) {
        return view('result');
    }   

    return redirect('/');
});


Route::get('/fjkgwegf', function(){
    return statistics::all();
});