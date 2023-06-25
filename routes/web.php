<?php

use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;


// First Step
Route::get('/', function () {
    return view('enter-email');
})->name('enter-email');

Route::post('/verify-email', [VerificationController::class, 'sendEmail'])->name('verify-email');

Route::get('/verify', function () {
    return view('verify-code');
})->name('verify');

Route::get('/vote', function () {
    return view('vote');
})->name('vote');

Route::post('/submit-vote', [VoteController::class, 'submitVote'])->name('submit-vote');

Route::post('/verify-code', [VerificationController::class, 'verifyCode'])->name('verify-code');

// Route::middleware(['verified', 'voted'])->group(function () {


 
// });


// // First Step
// Route::get('/', function () {
//     return view('enter-email');
// })->name('enter-email');

// Route::get('/verify-email', function () {
//     return view('verify-email');
// })->name('verify-email');


// Route::post('/verify-email', [VerificationController::class, 'sendEmail'])->name('verify-email');

// Route::post('/verify-code', [VerificationController::class, 'verifyCode'])->name('verify-code');

// Route::middleware(['verified', 'voted'])->group(function () {
//     Route::get('/vote', function () {
//         return view('vote');
//     })->name('vote');

//     Route::post('/submit-vote', [VoteController::class, 'submit'])->name('submit-vote');
// });
