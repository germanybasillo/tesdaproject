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

    $returnedCount = Assessment::where('status', 'returned')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    // 🔍 Debugging: Check if counts are correct
    \Log::info("Pending: $pendingCount, Approved: $approvedCount, Returned: $returnedCount");
    return view('list_view', compact('assessments', 'pendingCount', 'approvedCount', 'returnedCount'));    
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

    $returnedCount = Assessment::where('status', 'returned')
        ->when($user->role !== 'admin', fn($q) => $q->where('user_id', $user->id))
        ->count();

    // 🔍 Debugging: Check if counts are correct
    \Log::info("Pending: $pendingCount, Approved: $approvedCount, Returned: $returnedCount");

    return view('dashboard', compact('assessments', 'pendingCount', 'approvedCount', 'returnedCount'));
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::get('/dashboard', function (Request $request) {
//     $user = Auth::user();

//     // Admins see all assessments, regular users see only their own
//     if ($user->role === 'admin') {
//         $assessments = Assessment::all();
//         // Count the number of assessments for each status
//         $pendingCount = $assessments->where('status', 'pending')->count();
//         $approvedCount = $assessments->where('status', 'approved')->count();
//         $returnedCount = $assessments->where('status', 'returned')->count();
//         // Paginate assessments, displaying 10 per page
//         // $assessments = Assessment::paginate(10);

//         $status = $request->input('status');
//         $dateSubmitted = $request->input('date_submitted');

//         $assessments = Assessment::when($status, function ($query, $status) {
//             return $query->where('status', $status);
//         })
//         ->when($dateSubmitted, function ($query, $dateSubmitted) {
//             return $query->whereDate('created_at', $dateSubmitted);
//         })
//         ->paginate(10);

//     } else {
//         $assessments = Assessment::where('user_id', $user->id)->get();
//         // Count the number of assessments for each status
//         $pendingCount = $assessments->where('status', 'pending')->count();
//         $approvedCount = $assessments->where('status', 'approved')->count();
//         $returnedCount = $assessments->where('status', 'returned')->count();
//         // Paginate assessments, displaying 10 per page
//         // $assessments = Assessment::paginate(10);

//         $status = $request->input('status');
//         $dateSubmitted = $request->input('date_submitted');

//         $assessments = Assessment::when($status, function ($query, $status) {
//             return $query->where('status', $status);
//         })
//         ->when($dateSubmitted, function ($query, $dateSubmitted) {
//             return $query->whereDate('created_at', $dateSubmitted);
//         })
//         ->paginate(10);
//     }

//     return view('dashboard', compact('assessments', 'pendingCount', 'approvedCount', 'returnedCount'));
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/one/{id}', function ($id) {
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

    if (!$assessment) {
        abort(403, 'Unauthorized access'); // Prevent unauthorized access
    }

    // Fetch only the comments that belong to this assessment
    $comments = Comment::where('id', $assessment->id)->latest()->get();

    return view('view-document.one', compact('assessment', 'comments'));
})->middleware(['auth', 'verified']);


Route::get('/two/{id}', function ($id) {
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

    if (!$assessment) {
        abort(403, 'Unauthorized access'); // Prevent unauthorized access
    }

    // Fetch only the comments that belong to this assessment
    $comments = Comment::where('id', $assessment->id)->latest()->get();

    return view('view-document.one', compact('assessment', 'comments'));
})->middleware(['auth', 'verified']);

Route::get('/three/{id}', function ($id) {
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
 
     if (!$assessment) {
         abort(403, 'Unauthorized access'); // Prevent unauthorized access
     }
 
    // Fetch only the comments that belong to this assessment
    $comments = Comment::where('id', $assessment->id)->latest()->get();
 
     return view('view-document.one', compact('assessment', 'comments'));
  
})->middleware(['auth', 'verified']);

Route::get('/four/{id}', function ($id) {
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

    if (!$assessment) {
        abort(403, 'Unauthorized access'); // Prevent unauthorized access
    }

     // Fetch only the comments that belong to this assessment
     $comments = Comment::where('id', $assessment->id)->latest()->get();

    return view('view-document.one', compact('assessment', 'comments'));
  
})->middleware(['auth', 'verified']);


Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});


// Route::get('/apply', function () {
//     return view('apply');
// })->middleware(['auth', 'verified'])->name('apply');


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
    Route::get('/apply', function () {
        return view('apply');
    })->name('apply');
});

