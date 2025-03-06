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

        // Fetch only the comments that belong to this assessment
        $comments = Comment::where('id', $assessment->id)->latest()->get();

 
    } else {
        // Normal users can only access their own assessment
        $assessment = Assessment::where('user_id', $user->id)->where('id', $id)->first();
    }

    if (!$assessment) {
        abort(403, 'Unauthorized access'); // Prevent unauthorized access
    }

            // Fetch only the comments that belong to this assessment
            $comments = Comment::where('id', $assessment->id)->latest()->get();

    return view('view-document.view', compact('assessment', 'comments'));
})->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/assessments/create', [AssessmentController::class, 'create'])->name('assessments.create');
    Route::post('/assessments/one', [AssessmentController::class, 'one'])->name('assessments.one');
    Route::get('/assessments/{assessment}/edit', [AssessmentController::class, 'edit'])->name('assessments.edit');
    Route::put('/assessments/{assessment}', [AssessmentController::class, 'update'])->name('assessments.update');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin.restrict'])->group(function () {
    Route::get('/one', [Qualification::class, 'one'])->name('qualification.one');
});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
