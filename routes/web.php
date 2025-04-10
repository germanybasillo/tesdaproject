<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController; 
use Illuminate\Support\Facades\Auth;
use App\Models\Assessment;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Qualification;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;  // Import the User model


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
    $query = Assessment::query();
    $user = Auth::user();
        $assessments = Assessment::all();
      // Paginate the main assessment list
    $assessments = $query->paginate(10);

    // Get counts for each status separately with filtering
    $pendingCount = Assessment::where('status', 'pending')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    $approvedCount = Assessment::where('status', 'approved')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    $disapprovedCount = Assessment::where('status', 'disapproved')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    return view('list_view', compact('assessments', 'pendingCount', 'approvedCount', 'disapprovedCount'));    
})->middleware(['auth', 'verified'])->name('list_view');



Route::get('/dashboard', function (Request $request) {
    $user = Auth::user();
    $query = Assessment::query();

    // Filter assessments based on user role
    if ($user->role !== 'admin') {
        $query->where('user_id', $user->id);
    }

    // Apply filters for status and date
    $status = $request->input('status');
    $dateSubmitted = $request->input('date_submitted');

    $query->when($status, function ($q, $status) {
        return $q->where('status', $status);
    })->when($dateSubmitted, function ($q, $dateSubmitted) {
        return $q->whereDate('created_at', $dateSubmitted);
    });

    // Paginate the main assessment list
    $assessments = $query->paginate(10);

    // Get counts for each status separately with filtering
    $pendingCount = Assessment::where('status', 'pending')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    $approvedCount = Assessment::where('status', 'approved')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    $disapprovedCount = Assessment::where('status', 'disapproved')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    return view('dashboard', compact('assessments', 'pendingCount', 'approvedCount', 'disapprovedCount'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/view/{id}', function ($id) {
    // Get the authenticated user
    $user = Auth::user();

    // Check if the user is an admin
    if ($user->role === 'admin') {
        // Admin can access any assessment
        $assessment = Assessment::find($id);
    } else {
        // Normal users can only access their own assessment
        $assessment = Assessment::where('user_id', $user->id)->where('id', $id)->first();
    }

    // Fetch only the comments that belong to this assessment
    $assessment = Assessment::with('comments.user')->findOrFail($id);

    return view('view-document.view', compact('assessment'));
})->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/assessments/one', [AssessmentController::class, 'one'])->name('assessments.one');
    Route::put('/assessments/oneUpdate/{assessment}', [AssessmentController::class, 'oneUpdate'])->name('assessments.oneUpdate');
    Route::put('/assessments/{assessment}', [AssessmentController::class, 'update'])->name('assessments.update');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin.restrict'])->group(function () {
    Route::get('/one', [Qualification::class, 'one'])->name('qualification.one');
});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/qualificationEdit/{assessment}', function ($id) {
    // Check if the current day is Friday and the time is between 12:00 AM and 3:00 PM
    $currentDay = Carbon::now()->format('l'); // Get current day name
    $currentTime = Carbon::now()->format('H:i'); // Get current time in 24-hour format

    // Restrict access outside of Friday 12:00 AM - 3:00 PM
    if ($currentDay !== 'Wednesday' || ($currentTime < '00:00' || $currentTime > '15:00')) {
        // Set error message and redirect back
        return redirect()->back()->with('error', 'This page is only accessible on Fridays between 12:00 AM and 3:00 PM.');
    }

    // Find the assessment
    $assessment = Assessment::find($id);
    if (!$assessment) {
        abort(404); // Return 404 if assessment not found
    }

    // Check if the assessment status is 'approved' - block editing
    if ( $assessment->id && $assessment->status === 'approved') {
        return redirect()->back()->with('error', 'This assessment has already been approved and cannot be edited.');
    }

    // Return the view if conditions pass
    return view('qualification.edit', compact('assessment'));
})->middleware(['auth', 'verified'])->name('qualification.edit');