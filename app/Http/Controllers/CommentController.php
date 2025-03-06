<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|min:5|max:500',
            'assessment_id' => 'required|exists:assessments,id', // Ensure assessment_id is valid
        ]);
    
        Comment::create([
            'user_id' => Auth::id(),
            'assessment_id' => $request->assessment_id, // Store the assessment ID
            'comment' => $request->comment,
        ]);
    
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

}
