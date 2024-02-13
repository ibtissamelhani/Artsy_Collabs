<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::middleware(['auth', 'verified'])->group(function () {
    
    // artist routes
    Route::resource('Artists', ArtistController::class);

    //  projectUser route 

    Route::post('collaborate/{user}', [ProjectUserController::class, 'collaborate'])->name('collaborate');
    
    Route::group(['middleware' => ['admin']], function () {

        Route::post('assign-project/{user}', [ProjectUserController::class, 'store'])->name('assignProject');

        // Partners route
        Route::resource('partners', PartnerController::class);

        // Project route
        Route::resource('projects', ProjectController::class);

        // users route
        Route::resource('users', UserController::class);


        Route::put('projectUsers/{projectUserId}', [ProjectUserController::class, 'updateStatus'])->name('projectUsers.updateStatus');

        Route::delete('projectUsers/{projectUserId}', [ProjectUserController::class, 'destroy'])->name('projectUsers.destroy');

        //restore user route
        Route::put('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');

        //restore user route
        Route::put('partners/{id}/restore', [PartnerController::class, 'restore'])->name('partners.restore');
        
        //dashbord route
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    });
});









Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
