<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Mail\StatusUpdated;
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facade\Pdf;

class AssessmentController extends Controller
{

    public function one(Request $request)
    {
        // Convert empty strings to null before validation
        $request->merge(array_map(function($value) {
            return $value === '' ? null : $value;
        }, $request->all()));
 
        $request->validate([
            'assessment_date' => 'required|date|after_or_equal:today',
            'qualification' => 'nullable|string|max:255',
            'qualification2' => 'nullable|string|max:255',
            'qualification3' => 'nullable|string|max:255',
            'qualification4' => 'nullable|string|max:255',
            'no_of_pax' => 'nullable|integer',
            'no_of_pax2' => 'nullable|integer',
            'no_of_pax3' => 'nullable|integer',
            'no_of_pax4' => 'nullable|integer',
            'mix_no' => 'nullable|integer',
            'mix_no2' => 'nullable|integer',
            'mix_no3' => 'nullable|integer',
            'mix_no4' => 'nullable|integer',
            'training_status' => 'nullable|in:scholar,non-scholar,mix',
            'training_status2' => 'nullable|in:scholar,non-scholar,mix',
            'training_status3' => 'nullable|in:scholar,non-scholar,mix',
            'training_status4' => 'nullable|in:scholar,non-scholar,mix',
            'type_of_scholar' => 'nullable|string|max:255',
            'type_of_scholar2' => 'nullable|string|max:255',
            'type_of_scholar3' => 'nullable|string|max:255',
            'type_of_scholar4' => 'nullable|string|max:255',
            'type_of_non_scholar' => 'nullable|string|max:255',
            'type_of_non_scholar2' => 'nullable|string|max:255',
            'type_of_non_scholar3' => 'nullable|string|max:255',
            'type_of_non_scholar4' => 'nullable|string|max:255',
            'eltt' => 'nullable|mimes:pdf',
            'eltt2' => 'nullable|mimes:pdf',
            'eltt3' => 'nullable|mimes:pdf',
            'eltt4' => 'nullable|mimes:pdf',
            'rfftp' => 'nullable|mimes:pdf',
            'rfftp2' => 'nullable|mimes:pdf',
            'rfftp3' => 'nullable|mimes:pdf',
            'rfftp4' => 'nullable|mimes:pdf',
            'oropfafns' => 'nullable|mimes:pdf',
            'oropfafns2' => 'nullable|mimes:pdf',
            'oropfafns3' => 'nullable|mimes:pdf',
            'oropfafns4' => 'nullable|mimes:pdf',
            'sopcctvr' => 'nullable|mimes:pdf',
            'sopcctvr2' => 'nullable|mimes:pdf',
            'sopcctvr3' => 'nullable|mimes:pdf',
            'sopcctvr4' => 'nullable|mimes:pdf',
        ]);



if ( $request->hasFile('oropfafns')) {
    $request->merge(['oropfafns' => 'N/A']);
}

if ($request->hasFile('oropfafns2')) {
    $request->merge(['oropfafns2' => 'N/A']);
}

if ($request->hasFile('oropfafns3')) {
    $request->merge(['oropfafns3' => 'N/A']);
}

if ($request->hasFile('oropfafns4')) {
    $request->merge(['oropfafns4' => 'N/A']);
}

        // Create a new Assessment instance
        $assessment = new Assessment();
        $assessment->user_id = Auth::id();
        $assessment->assessment_date = $request->assessment_date;
        $assessment->qualification = $request->qualification;
        $assessment->qualification2 = $request->qualification2;
        $assessment->qualification3 = $request->qualification3;
        $assessment->qualification4 = $request->qualification4;
        $assessment->no_of_pax = $request->no_of_pax;
        $assessment->no_of_pax2 = $request->no_of_pax2;
        $assessment->no_of_pax3 = $request->no_of_pax3;
        $assessment->no_of_pax4 = $request->no_of_pax4;
        $assessment->mix_no = $request->mix_no;
        $assessment->mix_no2 = $request->mix_no2;
        $assessment->mix_no3 = $request->mix_no3;
        $assessment->mix_no4 = $request->mix_no4;
        $assessment->training_status = $request->training_status;
        $assessment->training_status2 = $request->training_status2;
        $assessment->training_status3 = $request->training_status3;
        $assessment->training_status4 = $request->training_status4;
        $assessment->type_of_scholar = $request->type_of_scholar;
        $assessment->type_of_scholar2 = $request->type_of_scholar2;
        $assessment->type_of_scholar3 = $request->type_of_scholar3;
        $assessment->type_of_scholar4 = $request->type_of_scholar4;
        $assessment->type_of_non_scholar = $request->type_of_non_scholar;
        $assessment->type_of_non_scholar2 = $request->type_of_non_scholar2;
        $assessment->type_of_non_scholar3 = $request->type_of_non_scholar3;
        $assessment->type_of_non_scholar4 = $request->type_of_non_scholar4;
        $assessment->status = 'pending';
    

        // Handle file uploads
        if ($request->hasFile('eltt')) {
            $file = $request->file('eltt');
            $filename = time() . '_eltt.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts'), $filename);
            $assessment->eltt = 'eltts/' . $filename;
        }

            // Handle file uploads
            if ($request->hasFile('eltt2')) {
                $file = $request->file('eltt2');
                $filename = time() . '_eltt2.' . $file->getClientOriginalExtension();
                $file->move(public_path('eltts2'), $filename);
                $assessment->eltt2 = 'eltts2/' . $filename;
            }

               // Handle file uploads
               if ($request->hasFile('eltt3')) {
                $file = $request->file('eltt3');
                $filename = time() . '_eltt3.' . $file->getClientOriginalExtension();
                $file->move(public_path('eltts3'), $filename);
                $assessment->eltt3 = 'eltts3/' . $filename;
            }

                  // Handle file uploads
                  if ($request->hasFile('eltt4')) {
                    $file = $request->file('eltt4');
                    $filename = time() . '_eltt4.' . $file->getClientOriginalExtension();
                    $file->move(public_path('eltts4'), $filename);
                    $assessment->eltt4 = 'eltts4/' . $filename;
                }


        if ($request->hasFile('rfftp')) {
            $file = $request->file('rfftp');
            $filename = time() . '_rfftp.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp'), $filename);
            $assessment->rfftp = 'rfftp/' . $filename;
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


        if ($request->hasFile('oropfafns')) {
            $file = $request->file('oropfafns');
            $filename = time() . '_oropfafns.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns'), $filename);
            $assessment->oropfafns = 'oropfafns/' . $filename;
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

        if ($request->hasFile('sopcctvr')) {
            $file = $request->file('sopcctvr');
            $filename = time() . '_sopcctvr.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr'), $filename);
            $assessment->sopcctvr = 'sopcctvr/' . $filename;
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


    public function oneUpdate(Request $request, $id)
    {
        // Convert empty strings to null before validation
        $request->merge(array_map(function($value) {
            return $value === '' ? null : $value;
        }, $request->all()));
 
        $request->validate([
            'assessment_date' => 'required|date|after_or_equal:today',
            'qualification' => 'nullable|string|max:255',
            'qualification2' => 'nullable|string|max:255',
            'qualification3' => 'nullable|string|max:255',
            'qualification4' => 'nullable|string|max:255',
            'no_of_pax' => 'nullable|integer',
            'no_of_pax2' => 'nullable|integer',
            'no_of_pax3' => 'nullable|integer',
            'no_of_pax4' => 'nullable|integer',
            'mix_no' => 'nullable|integer',
            'mix_no2' => 'nullable|integer',
            'mix_no3' => 'nullable|integer',
            'mix_no4' => 'nullable|integer',
            'training_status' => 'nullable|in:scholar,non-scholar,mix',
            'training_status2' => 'nullable|in:scholar,non-scholar,mix',
            'training_status3' => 'nullable|in:scholar,non-scholar,mix',
            'training_status4' => 'nullable|in:scholar,non-scholar,mix',
            'type_of_scholar' => 'nullable|string|max:255',
            'type_of_scholar2' => 'nullable|string|max:255',
            'type_of_scholar3' => 'nullable|string|max:255',
            'type_of_scholar4' => 'nullable|string|max:255',
            'type_of_non_scholar' => 'nullable|string|max:255',
            'type_of_non_scholar2' => 'nullable|string|max:255',
            'type_of_non_scholar3' => 'nullable|string|max:255',
            'type_of_non_scholar4' => 'nullable|string|max:255',
            'eltt' => 'nullable|mimes:pdf',
            'eltt2' => 'nullable|mimes:pdf',
            'eltt3' => 'nullable|mimes:pdf',
            'eltt4' => 'nullable|mimes:pdf',
            'rfftp' => 'nullable|mimes:pdf',
            'rfftp2' => 'nullable|mimes:pdf',
            'rfftp3' => 'nullable|mimes:pdf',
            'rfftp4' => 'nullable|mimes:pdf',
            'oropfafns' => 'nullable|mimes:pdf',
            'oropfafns2' => 'nullable|mimes:pdf',
            'oropfafns3' => 'nullable|mimes:pdf',
            'oropfafns4' => 'nullable|mimes:pdf',
            'sopcctvr' => 'nullable|mimes:pdf',
            'sopcctvr2' => 'nullable|mimes:pdf',
            'sopcctvr3' => 'nullable|mimes:pdf',
            'sopcctvr4' => 'nullable|mimes:pdf',
        ]);

 
if ( $request->hasFile('oropfafns')) {
    $request->merge(['oropfafns' => 'N/A']);
}

if ($request->hasFile('oropfafns2')) {
    $request->merge(['oropfafns2' => 'N/A']);
}

if ($request->hasFile('oropfafns3')) {
    $request->merge(['oropfafns3' => 'N/A']);
}

if ($request->hasFile('oropfafns4')) {
    $request->merge(['oropfafns4' => 'N/A']);
}


            // Update the assessment details
        $assessment = Assessment::findOrFail($id);
        $assessment->assessment_date = $request->assessment_date;
        $assessment->qualification = $request->qualification;
        $assessment->qualification2 = $request->qualification2;
        $assessment->qualification3 = $request->qualification3;
        $assessment->qualification4 = $request->qualification4;
        $assessment->no_of_pax = $request->no_of_pax;
        $assessment->no_of_pax2 = $request->no_of_pax2;
        $assessment->no_of_pax3 = $request->no_of_pax3;
        $assessment->no_of_pax4 = $request->no_of_pax4;
        $assessment->mix_no = $request->mix_no;
        $assessment->mix_no2 = $request->mix_no2;
        $assessment->mix_no3 = $request->mix_no3;
        $assessment->mix_no4 = $request->mix_no4;
        $assessment->training_status = $request->training_status;
        $assessment->training_status2 = $request->training_status2;
        $assessment->training_status3 = $request->training_status3;
        $assessment->training_status4 = $request->training_status4;
        $assessment->type_of_scholar = $request->type_of_scholar;
        $assessment->type_of_scholar2 = $request->type_of_scholar2;
        $assessment->type_of_scholar3 = $request->type_of_scholar3;
        $assessment->type_of_scholar4 = $request->type_of_scholar4;
        $assessment->type_of_non_scholar = $request->type_of_non_scholar;
        $assessment->type_of_non_scholar2 = $request->type_of_non_scholar2;
        $assessment->type_of_non_scholar3 = $request->type_of_non_scholar3;
        $assessment->type_of_non_scholar4 = $request->type_of_non_scholar4;
  
        

        // Handle file uploads
        if ($request->hasFile('eltt')) {
            $file = $request->file('eltt');
            $filename = time() . '_eltt.' . $file->getClientOriginalExtension();
            $file->move(public_path('eltts'), $filename);
            $assessment->eltt = 'eltts/' . $filename;
        }

            // Handle file uploads
            if ($request->hasFile('eltt2')) {
                $file = $request->file('eltt2');
                $filename = time() . '_eltt2.' . $file->getClientOriginalExtension();
                $file->move(public_path('eltts2'), $filename);
                $assessment->eltt2 = 'eltts2/' . $filename;
            }

               // Handle file uploads
               if ($request->hasFile('eltt3')) {
                $file = $request->file('eltt3');
                $filename = time() . '_eltt3.' . $file->getClientOriginalExtension();
                $file->move(public_path('eltts3'), $filename);
                $assessment->eltt3 = 'eltts3/' . $filename;
            }

                  // Handle file uploads
                  if ($request->hasFile('eltt4')) {
                    $file = $request->file('eltt4');
                    $filename = time() . '_eltt4.' . $file->getClientOriginalExtension();
                    $file->move(public_path('eltts4'), $filename);
                    $assessment->eltt4 = 'eltts4/' . $filename;
                }


        if ($request->hasFile('rfftp')) {
            $file = $request->file('rfftp');
            $filename = time() . '_rfftp.' . $file->getClientOriginalExtension();
            $file->move(public_path('rfftp'), $filename);
            $assessment->rfftp = 'rfftp/' . $filename;
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


        if ($request->hasFile('oropfafns')) {
            $file = $request->file('oropfafns');
            $filename = time() . '_oropfafns.' . $file->getClientOriginalExtension();
            $file->move(public_path('oropfafns'), $filename);
            $assessment->oropfafns = 'oropfafns/' . $filename;
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

        if ($request->hasFile('sopcctvr')) {
            $file = $request->file('sopcctvr');
            $filename = time() . '_sopcctvr.' . $file->getClientOriginalExtension();
            $file->move(public_path('sopcctvr'), $filename);
            $assessment->sopcctvr = 'sopcctvr/' . $filename;
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
        
        return redirect()->route('dashboard')->with('success', 'Assessment updated successfully!');
    }


    /**
     * Update the specified assessment in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,approved,disapproved',
        ]);

        $assessment = Assessment::findOrFail($id);
        $assessment->status = $request->status;
        $assessment->save();

        // Send email notification
    // Mail::to('germanybasillo@gmail.com')->send(new StatusUpdated($assessment));

         // Retrieve all assessors
    $assessors = Assessment::all(); 

    // // Generate PDF
    // $pdf = Pdf::loadView('assessors_pdf', compact('assessors'));

    // // Return PDF for direct download or view
    // return $pdf->stream('Assessment_Assessors.pdf');

    return redirect()->route('dashboard')->with('success', 'Assessment created successfully!');

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

