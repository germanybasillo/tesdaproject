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
            'assessment_id' => 'required|exists:assessments,id',
            'comment' => 'required|string|max:500',
        ]);
    
        Comment::create([
            'user_id' => auth()->id(),
            'assessment_id' => $request->assessment_id,
            'comment' => $request->comment,
        ]);
    
        return redirect()->back()->with('success', 'Comment sent to the user.');

    }

}
