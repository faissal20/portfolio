<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\StatisticsController;
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
            'action_by' => auth()->user()->username,
            'action_data' => json_encode(['ip' => $ip, 'user_agent' => $user_agent])
        ]);

        auth()->logout();

        return redirect('/');
    })->name('logout');
});


Route::prefix('api')->group(function(){

    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/home/leaveMessage', [HomeController::class, 'leaveMessage']);

    Route::get('/notifications', [NotificationsController::class, 'index']);
    Route::get('/notifications/{id}', [NotificationsController::class, 'show']);
    Route::post('/notifications', [NotificationsController::class, 'store']);
    Route::put('/notifications/{id}', [NotificationsController::class, 'update']);
    Route::delete('/notifications/{id}', [NotificationsController::class, 'destroy']);

    Route::get('/ourStatistics', [StatisticsController::class, 'index']);
    Route::get('/ourStatistics/{id}', [StatisticsController::class, 'show']);
    Route::post('/ourStatistics', [StatisticsController::class, 'store']);
    Route::put('/ourStatistics/{id}', [StatisticsController::class, 'update']);
    Route::delete('/ourStatistics/{id}', [StatisticsController::class, 'destroy']);


})->middleware('auth');



Route::get('/data', function(){
    return statistics::all();
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
