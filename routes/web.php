<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\TicketController;
use OpenAI\Laravel\Facades\OpenAI;
use Laravel\Socialite\Facades\Socialite;


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
//$user = DB::select("select * from users where email = ?", ['ashishrana288@gmail.com']);
//$user = DB::table('users')->get();
//$user = DB::table('users')->where('name', 'Lavi R')->first();
//$user = User::where('id', 1)->get(); 
/*
$user = DB::table('users')->insert([
  'name' => 'Lavi Rana',
  'email' => 'lavi@gmail.com',
  'password' => 'password',
]);
*/

//$user = DB::table('users')->where('id', 2)->update(['name' => 'Lavi R']);
//dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';



Route::get('/openai', function (){    
$result = OpenAI::images()->create([
    'prompt' => 'A futuristic cityscape at sunset',
    'n' => 1,
    'size' => '256x256',
]);
dd($result);
});


Route::post('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    $user = User::firstOrCreate(['email' => $user->email],[
'name' => $user->name,
'avatar' => $user->avatar,
'password' => 'password',
]);
    Auth::login($user);
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function() {
       //Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
        //Route::post('/ticket/create', [TicketController::class, 'store'])->name('tickek.store');  
        Route::resource('/ticket',TicketController::class);
});