<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    /**
     * Display a listing of assessments.
     */
    public function index()
    {
        $assessments = Assessment::where('user_id', Auth::id())->get();
        return view('assessments.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new assessment.
     */
    public function create()
    {
        return view('assessments.create');
    }

    /**
     * Store a newly created assessment in storage.
     */
    public function store(Request $request)
    {
 

        $request->validate([
            'assessment_date' => 'required|date|after_or_equal:today',
            'qualification1' => 'required|string|max:255',
            'qualification2' => 'required|string|max:255',
            'qualification3' => 'required|string|max:255',
            'qualification4' => 'required|string|max:255',
            'no_of_pax1' => 'required|integer',
            'no_of_pax2' => 'required|integer',
            'no_of_pax3' => 'required|integer',
            'no_of_pax4' => 'required|integer',
            'training_status1' => 'required|in:scholar,non-scholar',
            'training_status2' => 'required|in:scholar,non-scholar',
            'training_status3' => 'required|in:scholar,non-scholar',
            'training_status4' => 'required|in:scholar,non-scholar',
            'type_of_scholar1' => 'nullable|string|max:255',
            'type_of_scholar2' => 'nullable|string|max:255',
            'type_of_scholar3' => 'nullable|string|max:255',
            'type_of_scholar4' => 'nullable|string|max:255',
            'eltt1' => 'required|mimes:pdf',
            'eltt2' => 'required|mimes:pdf',
            'eltt3' => 'required|mimes:pdf',
            'eltt4' => 'required|mimes:pdf',
            'rfftp1' => 'required|mimes:pdf',
            'rfftp2' => 'required|mimes:pdf',
            'rfftp3' => 'required|mimes:pdf',
            'rfftp4' => 'required|mimes:pdf',
            'oropfafns1' => 'nullable|mimes:pdf',
            'oropfafns2' => 'nullable|mimes:pdf',
            'oropfafns3' => 'nullable|mimes:pdf',
            'oropfafns4' => 'nullable|mimes:pdf',
            'sopcctvr1' => 'required|mimes:pdf',
            'sopcctvr2' => 'required|mimes:pdf',
            'sopcctvr3' => 'required|mimes:pdf',
            'sopcctvr4' => 'required|mimes:pdf',
        ]);

        // If training status is non-scholar, set type_of_scholar to 'NA'
if ($request->training_status1 == 'non-scholar1') {
    $request->merge(['type_of_scholar1' => 'N/A']);
}

if ($request->training_status2 == 'non-scholar2') {
    $request->merge(['type_of_scholar2' => 'N/A']);
}

if ($request->training_status3 == 'non-scholar3') {
        $request->merge(['type_of_scholar3' => 'N/A']);
}

if ($request->training_status4 == 'non-scholar4') {
            $request->merge(['type_of_scholar4' => 'N/A']);
}

 // If training status is scholar and no file uploaded, set 'N/A'
if ($request->training_status1 == 'scholar1' && !$request->hasFile('oropfafns1')) {
    $request->merge(['oropfafns1' => 'N/A']);
}

if ($request->training_status2 == 'scholar2' && !$request->hasFile('oropfafns2')) {
    $request->merge(['oropfafns2' => 'N/A']);
}

if ($request->training_status3 == 'scholar3' && !$request->hasFile('oropfafns3')) {
    $request->merge(['oropfafns3' => 'N/A']);
}

if ($request->training_status4 == 'scholar4' && !$request->hasFile('oropfafns4')) {
    $request->merge(['oropfafns4' => 'N/A']);
}

        // Create a new Assessment instance
        $assessment = new Assessment();
        $assessment->user_id = Auth::id();
        $assessment->assessment_date = $request->assessment_date;
        $assessment->qualification1 = $request->qualification1;
        $assessment->qualification2 = $request->qualification2;
        $assessment->qualification3 = $request->qualification3;
        $assessment->qualification4 = $request->qualification4;
        $assessment->no_of_pax1 = $request->no_of_pax1;
        $assessment->no_of_pax2 = $request->no_of_pax2;
        $assessment->no_of_pax3 = $request->no_of_pax3;
        $assessment->no_of_pax4 = $request->no_of_pax4;
        $assessment->training_status1 = $request->training_status1;
        $assessment->training_status2 = $request->training_status2;
        $assessment->training_status3 = $request->training_status3;
        $assessment->training_status4 = $request->training_status4;
        $assessment->type_of_scholar1 = $request->type_of_scholar1;
        $assessment->type_of_scholar2 = $request->type_of_scholar2;
        $assessment->type_of_scholar3 = $request->type_of_scholar3;
        $assessment->type_of_scholar4 = $request->type_of_scholar4;
        $assessment->status = 'pending';
    

        // Handle file uploads
        if ($request->hasFile('eltt1')) {
            $file = $request->file('eltt1');
            $filename = time() . '_eltt1.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts1'), $filename);
            $assessment->eltt1 = 'eltts1/' . $filename;
        }

        if ($request->hasFile('eltt2')) {
            $file = $request->file('eltt2');
            $filename = time() . '_eltt2.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts2'), $filename);
            $assessment->eltt2 = 'eltts2/' . $filename;
        }

        if ($request->hasFile('eltt3')) {
            $file = $request->file('eltt3');
            $filename = time() . '_eltt3.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts3'), $filename);
            $assessment->eltt3 = 'eltts3/' . $filename;
        }

        if ($request->hasFile('eltt4')) {
            $file = $request->file('eltt4');
            $filename = time() . '_eltt4.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts4'), $filename);
            $assessment->eltt4 = 'eltts4/' . $filename;
        }

        if ($request->hasFile('rfftp1')) {
            $file = $request->file('rfftp1');
            $filename = time() . '_rfftp1.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp1'), $filename);
            $assessment->rfftp1 = 'rfftp1/' . $filename;
        }

        if ($request->hasFile('rfftp2')) {
            $file = $request->file('rfftp2');
            $filename = time() . '_rfftp2.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp2'), $filename);
            $assessment->rfftp2 = 'rfftp2/' . $filename;
        }

        if ($request->hasFile('rfftp3')) {
            $file = $request->file('rfftp3');
            $filename = time() . '_rfftp3.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp3'), $filename);
            $assessment->rfftp3 = 'rfftp3/' . $filename;
        }

        if ($request->hasFile('rfftp4')) {
            $file = $request->file('rfftp4');
            $filename = time() . '_rfftp4.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp4'), $filename);
            $assessment->rfftp4 = 'rfftp4/' . $filename;
        }


        if ($request->hasFile('oropfafns1')) {
            $file = $request->file('oropfafns1');
            $filename = time() . '_oropfafns1.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns1'), $filename);
            $assessment->oropfafns1 = 'oropfafns1/' . $filename;
        }

        if ($request->hasFile('oropfafns2')) {
            $file = $request->file('oropfafns2');
            $filename = time() . '_oropfafns2.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns2'), $filename);
            $assessment->oropfafns2 = 'oropfafns2/' . $filename;
        }

        if ($request->hasFile('oropfafns3')) {
            $file = $request->file('oropfafns3');
            $filename = time() . '_oropfafns3.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns3'), $filename);
            $assessment->oropfafns3 = 'oropfafns3/' . $filename;
        }

        if ($request->hasFile('oropfafns4')) {
            $file = $request->file('oropfafns4');
            $filename = time() . '_oropfafns4.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns4'), $filename);
            $assessment->oropfafns4 = 'oropfafns4/' . $filename;
        }

        if ($request->hasFile('sopcctvr1')) {
            $file = $request->file('sopcctvr1');
            $filename = time() . '_sopcctvr1.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr1'), $filename);
            $assessment->sopcctvr1 = 'sopcctvr1/' . $filename;
        }

        if ($request->hasFile('sopcctvr2')) {
            $file = $request->file('sopcctvr2');
            $filename = time() . '_sopcctvr2.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr2'), $filename);
            $assessment->sopcctvr2 = 'sopcctvr2/' . $filename;
        }

        if ($request->hasFile('sopcctvr3')) {
            $file = $request->file('sopcctvr3');
            $filename = time() . '_sopcctvr3.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr3'), $filename);
            $assessment->sopcctvr3 = 'sopcctvr3/' . $filename;
        }

        if ($request->hasFile('sopcctvr4')) {
            $file = $request->file('sopcctvr4');
            $filename = time() . '_sopcctvr4.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr4'), $filename);
            $assessment->sopcctvr4 = 'sopcctvr4/' . $filename;
        }

        $assessment->save();

        return redirect()->route('dashboard')->with('success', 'Assessment created successfully!');
    }

    /**
     * Display the specified assessment.
     */
    // public function show(Assessment $assessment)
    // {
    //     return view('assessments.show', compact('assessment'));
    // }

    /**
     * Show the form for editing the specified assessment.
     */
    public function edit(Assessment $assessment)
    {
        return view('assessments.edit', compact('assessment'));
    }

    /**
     * Update the specified assessment in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'assessment_date' => 'required|date|after_or_equal:today',
            'qualification' => 'required|string|max:255',
            'no_of_pax' => 'required|integer',
            'training_status' => 'required|in:scholar,non-scholar',
            'type_of_scholar' => 'nullable|string|max:255',
            'eltt' => 'required|mimes:pdf',
            'rfftp' => 'required|mimes:pdf',
            'oropfafns' => 'required|mimes:pdf',
            'sopcctvr' => 'required|mimes:pdf',
        ]);

                // If training status is non-scholar, set type_of_scholar to 'NA'
if ($request->training_status == 'non-scholar') {
    $request->merge(['type_of_scholar' => 'N/A']);
}

 // If training status is scholar, set oropfafns to 'NA'
 if ($request->training_status == 'scholar') {
    $request->merge(['oropfafns' => 'N/A']);
 }

        $assessment = Assessment::findOrFail($id);

        $assessment->assessment_date = $request->assessment_date;
        $assessment->qualification = $request->qualification;
        $assessment->no_of_pax = $request->no_of_pax;
        $assessment->training_status = $request->training_status;
        $assessment->type_of_scholar = $request->type_of_scholar;


        // Handle file uploads
        if ($request->hasFile('eltt')) {
            $file = $request->file('eltt');
            $filename = time() . '_eltt.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts'), $filename);
            $assessment->eltt = 'eltts/' . $filename;
        }

        if ($request->hasFile('rfftp')) {
            $file = $request->file('rfftp');
            $filename = time() . '_rfftp.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp'), $filename);
            $assessment->rfftp = 'rfftp/' . $filename;
        }

        if ($request->hasFile('oropfafns')) {
            $file = $request->file('oropfafns');
            $filename = time() . '_oropfafns.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns'), $filename);
            $assessment->oropfafns = 'oropfafns/' . $filename;
        }

        if ($request->hasFile('sopcctvr')) {
            $file = $request->file('sopcctvr');
            $filename = time() . '_sopcctvr.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr'), $filename);
            $assessment->sopcctvr = 'sopcctvr/' . $filename;
        }

        $assessment->save();

        return redirect()->route('dashboard')->with('success', 'Assessment updated successfully!');
    }

    /**
     * Remove the specified assessment from storage.
     */
    public function destroy(Assessment $assessment)
    {
        $assessment->delete();
        return redirect()->route('assessments.index')->with('success', 'Assessment deleted successfully!');
    }
}