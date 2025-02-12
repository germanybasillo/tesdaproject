<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController; 
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Qualification;
use App\Models\Comment;

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
    $comments = Comment::latest()->get();


        return view('view-document.one', compact('assessment','comments')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);


Route::get('/two/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();
    $comments = Comment::latest()->get();

        return view('view-document.two', compact('assessment','comments')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);

Route::get('/three/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();
    $comments = Comment::latest()->get();

        return view('view-document.three', compact('assessment','comments')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);

Route::get('/four/{id}', function ($id) {
    // Retrieve the specific assessment for the authenticated user
    $assessment = Assessment::where('user_id', Auth::id())->where('id', $id)->first();
    $comments = Comment::latest()->get();

        return view('view-document.four', compact('assessment','comments')); // Pass a single assessment to the view
  
})->middleware(['auth', 'verified']);


Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});


Route::get('/apply', function () {
    return view('apply');
})->middleware(['auth', 'verified'])->name('apply');


Route::get('/list_view', function () {
    $assessments = Assessment::all(); // Fetch all assessments
    return view('list_view', compact('assessments'));
})->middleware(['auth', 'verified'])->name('list_view');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/assessments/create', [AssessmentController::class, 'create'])->name('assessments.create');
    Route::post('/assessments/one', [AssessmentController::class, 'one'])->name('assessments.one');
    Route::post('/assessments/two', [AssessmentController::class, 'two'])->name('assessments.two');
    Route::post('/assessments/three', [AssessmentController::class, 'three'])->name('assessments.three');
    Route::post('/assessments/four', [AssessmentController::class, 'four'])->name('assessments.four');
    Route::get('/assessments/{assessment}/edit', [AssessmentController::class, 'edit'])->name('assessments.edit');
    Route::put('/assessments/{assessment}', [AssessmentController::class, 'update'])->name('assessments.update');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin.restrict'])->group(function () {
    Route::get('/one', [Qualification::class, 'one'])->name('qualification.one');
    Route::get('/two', [Qualification::class, 'two'])->name('qualification.two');
    Route::get('/three', [Qualification::class, 'three'])->name('qualification.three');
    Route::get('/four', [Qualification::class, 'four'])->name('qualification.four');
});
