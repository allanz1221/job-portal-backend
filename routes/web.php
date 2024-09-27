<?php

use App\Http\Controllers\ProfessionalProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;

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
/*
Route::resource('/', ProfileController::class);
Route::get('/dashboard', function () {
    $user = Auth::user();
    $profile = ProfileController::where('user_id', $user)->get();
    return view('dashboard',compact('profile'));
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::resource('/dashboard', ProfessionalProfileController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// web.php
Route::patch('/professional-profile/{profile}', [ProfileController::class, 'update'])->name('professional-profile.update');
Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
Route::get('/user/skills', [SkillController::class, 'getUserSkills'])->name('user.skills');
Route::post('/skills/delete', [SkillController::class, 'delete'])->name('skills.delete');

Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');



require __DIR__.'/auth.php';
