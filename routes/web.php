<?php

use App\Models\User;
use App\Models\SystemLog;
use App\Models\statistics;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ReplyController;
use App\Http\Controllers\Api\StatisticsController;
use App\Http\Controllers\Api\NotificationsController;

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

    return redirect('/home');

})->name('welcome');


Route::middleware('guest')->group(function () {

    Route::get('/login', function (Request $request) {
        return view('login');
    });

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
    
        $user->logs()->create([
            'type' => 'login',
            'data' => json_encode(['ip' => $ip, 'user_agent' => $user_agent])
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

        $request->user()->logs()->create([
            'type' => 'logout',
            'data' => json_encode(['ip' => $ip, 'user_agent' => $user_agent]),
        ]);


        auth()->logout();

        $request->session()->invalidate();

        return redirect('/');
    })->name('logout');
});


Route::prefix('api')->group(function(){

    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/home/reply/{daily_message}', [ReplyController::class, 'store']);

    Route::get('/notifications', [NotificationsController::class, 'index']);
    Route::get('/notifications/{id}', [NotificationsController::class, 'show']);
    Route::post('/notifications', [NotificationsController::class, 'store']);
    Route::put('/notifications/{id}', [NotificationsController::class, 'update']);
    Route::delete('/notifications/{id}', [NotificationsController::class, 'destroy']);

    Route::get('/ourStatistics', [StatisticsController::class, 'index']);
    Route::get('/ourStatistics/{id}', [StatisticsController::class, 'show']);
    Route::post('/ourStatistics', [StatisticsController::class, 'store']);
    Route::put('/ourStatistics', [StatisticsController::class, 'update']);
    Route::delete('/ourStatistics/{id}', [StatisticsController::class, 'destroy']);


})->middleware('auth');



Route::get('/data', function(){
    return SystemLog::with('user:id,username')->get();
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
