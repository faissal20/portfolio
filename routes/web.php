<?php

use App\Models\statistics;
use App\Models\User;
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

    return view('welcome');

})->name('welcome');


Route::middleware('guest')->group(function () {

    Route::get('/login', function (Request $request) {
        return view('login');
    })->name('login');

    Route::post('/login', function (Request $request) {

        $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);


        $user = User::where('username', $request->username)->firstOrFail();

        if(!password_verify($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Invalid password']);
        }

        if($request->remember) {
            $token = Str::random(60);
            $user->forceFill([
                'remember_token' => hash('sha256', $token),
            ])->save();

            cookie()->queue('remember', $token, 60 * 24 * 30);
        }

        auth()->login($user, true);

        $ip = $request->ip();
        $user_agent = $request->header('User-Agent');
    
        statistics::forceCreate([
            'action_type' => 'login',
            'action_by' => $user->username,
            'action_data' => json_encode(['ip' => $ip, 'user_agent' => $user_agent]),
        ]);
    
        return redirect('/home');
        
    })->name('login');
});


Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/logout', function (Request $request) {

        $ip = $request->ip();
        $user_agent = $request->header('User-Agent');
    
        statistics::forceCreate([
            'action_type' => 'logout',
            'action_taken' => true,
            'action_by' => json_encode(['ip' => $ip, 'user_agent' => $user_agent])
        ]);

        return redirect('/');
    })->name('logout');
});





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
