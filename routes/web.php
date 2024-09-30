<?php

use App\Models\User;
use App\Models\SystemLog;
use App\Events\NewMessage;
use App\Models\statistics;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\LogServices;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ReplyController;
use App\Http\Controllers\Api\MoviesController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\StatisticsController;
use App\Http\Controllers\Api\NotificationsController;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        ]);


        $user = User::where('username', $request->username)->firstOrFail();

        if (!password_verify($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Invalid password']);
        }

        auth()->login($user, true);

        LogServices::store($request, 'login', [], $user);

        return redirect('/home');
    })->name('login');
});

Route::get('/story', function (Request $request) {
    $forgive = cache()->get('forgive');
    // dd($forgive);
    return view('story', [
        'forgive' => $forgive,
    ]);
});

Route::get('/hbd', function(Request $request) {
    return view('hbd');
});

Route::post('/story', function (Request $request) {
    cache()->put('forgive', true);
    return view('story', [
        'forgive' => true,
    ]);
})->name('story.submit');


Route::middleware('auth')->group(function () {



    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/logout', function (Request $request) {
        LogServices::store($request, 'logout', [], null);
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/');
    })->name('logout');
});


Route::prefix('api')->group(function () {

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/replies', [ReplyController::class, 'index']);
    Route::post('/home/reply/{daily_message}', [ReplyController::class, 'store']);

    Route::get('/notifications', [NotificationsController::class, 'index']);
    Route::get('/notifications/logs', [NotificationsController::class, 'showLogs']);
    Route::get('/notifications/{id}', [NotificationsController::class, 'show']);
    Route::post('/notifications', [NotificationsController::class, 'store']);
    Route::put('/notifications/{id}', [NotificationsController::class, 'update']);
    Route::delete('/notifications/{id}', [NotificationsController::class, 'destroy']);

    Route::get('/statistics', [StatisticsController::class, 'index']);
    Route::get('/statistic', [StatisticsController::class, 'show']);
    Route::get('/statistics/{username}', [StatisticsController::class, 'showByUsername']);
    Route::post('/statistics', [StatisticsController::class, 'store']);
    Route::put('/statistics', [StatisticsController::class, 'update']);
    Route::delete('/ourStatistics/{id}', [StatisticsController::class, 'destroy']);

    // chat routes
    Route::get('/chat', [MessageController::class, 'index']);
    Route::post('/chat', [MessageController::class, 'store']);
})->middleware('auth');



Route::get('/data', function (Request $request) {
    if ($request->user()->role == 'admin')
        return SystemLog::with('user:id,username')->get();
    else
        throw new HttpResponseException(response()->json(['error' => 'you are not an admin'], 200));
})->middleware('auth');


Route::get('api/movies', [MoviesController::class, 'index']);
Route::post('api/movies', [MoviesController::class, 'store']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
