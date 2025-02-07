<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController; 
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
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
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
	$assessments = Assessment::where('user_id', Auth::id())->get(); // Retrieve assessments for the authenticated user
return view('dashboard', compact('assessments'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/one/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();


        return view('view-document.one', compact('assessment')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);


Route::get('/two/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();


        return view('view-document.two', compact('assessment')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);

Route::get('/three/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();


        return view('view-document.three', compact('assessment')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);

Route::get('/four/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();


        return view('view-document.four', compact('assessment')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);

Route::get('/apply', function () {
    return view('apply');
})->middleware(['auth', 'verified'])->name('apply');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/assessments/create', [AssessmentController::class, 'create'])->name('assessments.create');
    Route::post('/assessments/store', [AssessmentController::class, 'store'])->name('assessments.store');
    Route::post('/assessments/storeTwo', [AssessmentController::class, 'storeTwo'])->name('assessments.storeTwo');
    Route::get('/assessments/{assessment}/edit', [AssessmentController::class, 'edit'])->name('assessments.edit');
    Route::put('/assessments/{assessment}', [AssessmentController::class, 'update'])->name('assessments.update');
});

require __DIR__.'/auth.php';
