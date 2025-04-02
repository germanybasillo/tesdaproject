<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
    <style>
        table {
            width: 100%;
            height: 70vh;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .title {
            font-weight: bold;
        }
        .submitted-by, .assigned-to, .status {
            font-style: italic;
        }
        .description {
            white-space: pre-wrap;
        }
        .view-file {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .pending {
    color: #856404; /* Dark yellow text */
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 4px;
    background-color: #fff3cd; /* Light yellow background */
    transition: background-color 0.3s ease, color 0.3s ease;
}

.pending:hover {
    background-color: #ffeeba; /* Slightly darker yellow on hover */
    color: #856404; /* Dark yellow text on hover */
}

.approved {
    color: #155724; /* Dark green text */
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 4px;
    background-color: #d4edda; /* Light green background */
    transition: background-color 0.3s ease, color 0.3s ease;
}

.approved:hover {
    background-color: #c3e6cb; /* Slightly darker green on hover */
    color: #155724; /* Dark green text on hover */
}

.disapproved {
    color: red;
    font-weight: bold;
    padding: 8px 16px;
    border-radius: 4px;
    background-color: #f8d7da; /* Light red background */
    transition: background-color 0.3s ease;
}

.disapproved:hover {
    background-color: #f1b0b7; /* Slightly darker red on hover */
}

    </style>
</head>
<body>
<h2>Qualification Details</h2>
@if ($assessment)
    <table>
        <tr>
            <th class="title">No</th>
            <td>{{$assessment->id}}</td>
        </tr>
        <tr>
            <th class="title">Region</th>
            <td>Region XI - Davao</td>
        </tr>
        <tr>
            <th class="title">Province</th>
            <td>Davao del Norte</td>
        </tr>
        <tr>
            <th class="title">Date Submitted</th>
            <td>{{ $assessment->created_at->timezone('Asia/Manila')->format('M d, Y - h:i A') }}</td>

        </tr>
        <tr>
            <th class="title">Last Update</th>
            <td>{{ \Carbon\Carbon::parse($assessment->updated_at)->timezone('Asia/Manila')->format('F j, Y g:i A') }}</td>
        </tr>
        <tr>
            <th class="title">Submitted by</th>
            <td class="submitted-by">{{$assessment->user->name}} ({{$assessment->user->email}})</td>
        </tr>
        <!-- <tr>
            <th class="title">Assigned To</th>
            <td class="assigned-to">ROPO</td>
        </tr> -->
        <tr>
            <th class="title">Status</th>
            <td class="{{ 
                $assessment->status == 'pending' ? 'pending' : 
                ($assessment->status == 'approved' ? 'approved' : 
                ($assessment->status == 'disapproved' ? 'disapproved' : ''))
            }}">{{$assessment->status}}</td>
        </tr>
        <tr>
            <th class="title">Comment About His PDF</th>
            
            <td>
            @if($assessment->comments->isEmpty())
            @if (Auth::user()->role === 'user')
            <p style="color:gray">No comments yet about this PDF.</p>
            @endif
    @else
    @foreach($assessment->comments as $comment)
        <p style="color:red">{{ $comment->comment }}</p>
        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
    @endforeach
    @endif
    
            @if (Auth::user()->role === 'admin')
            <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div style="display: flex; width: 100%; align-items: center;">
            <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
    <input name="comment" style="flex: 1; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Write a comment about his PDF..." required>
    <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px;">Submit</button>
    </div>
        </form>
        @endif
        </td>
        </tr>
        <tr>
    <th class="title">Attached File</th>
    <!-- <td>Letter of Attached Case</td> -->
    <td>
        @if (!empty($assessment->eltt) && file_exists(public_path($assessment->eltt)))
            <a href="{{ asset($assessment->eltt) }}" target="_blank" class="view-file">Endorsement Letter To TESDA</a><br>
        @else
 
        @endif

        @if (!empty($assessment->rfftp) && file_exists(public_path($assessment->rfftp)))
            <a href="{{ asset($assessment->rfftp) }}" target="_blank" class="view-file">Request Form For Test Package</a><br>
        @else
 
        @endif

        @if (!empty($assessment->oropfafns) && file_exists(public_path($assessment->oropfafns)) && $assessment->training_status !== 'scholar')
        <a href="{{ asset($assessment->oropfafns) }}" target="_blank" class="view-file">Official Receipt of Payment for Assessment for Non-Scholar</a><br>
        @else
  
        @endif

        @if (!empty($assessment->sopcctvr) && file_exists(public_path($assessment->sopcctvr)))
            <a href="{{ asset($assessment->sopcctvr) }}" target="_blank" class="view-file">Submission of Previous CCTV Recordings</a><br>
        @else
      
        @endif
    
        @if (!empty($assessment->eltt2) && file_exists(public_path($assessment->eltt2)))
            <a href="{{ asset($assessment->eltt2) }}" target="_blank" class="view-file">Endorsement Letter To TESDA 2</a><br>
        @else

        @endif

        @if (!empty($assessment->rfftp2) && file_exists(public_path($assessment->rfftp2)))
            <a href="{{ asset($assessment->rfftp2) }}" target="_blank" class="view-file">Request Form For Test Package 2</a><br>
        @else

        @endif
        

        @if (!empty($assessment->oropfafns2) && file_exists(public_path($assessment->oropfafns2)) && $assessment->training_status2 !== 'scholar')
            <a href="{{ asset($assessment->oropfafns2) }}" target="_blank" class="view-file">Official Receipt of Payment for Assessment for Non-Scholar 2</a><br>
        @else

        @endif

        @if (!empty($assessment->sopcctvr2) && file_exists(public_path($assessment->sopcctvr2)))
            <a href="{{ asset($assessment->sopcctvr2) }}" target="_blank" class="view-file">Submission of Previous CCTV Recordings 2</a><br>
        @else

        @endif

        @if (!empty($assessment->eltt3) && file_exists(public_path($assessment->eltt3)))
            <a href="{{ asset($assessment->eltt3) }}" target="_blank" class="view-file">Endorsement Letter To TESDA 3</a><br>
        @else

        @endif

        @if (!empty($assessment->rfftp3) && file_exists(public_path($assessment->rfftp3)))
            <a href="{{ asset($assessment->rfftp3) }}" target="_blank" class="view-file">Request Form For Test Package 3</a><br>
        @else

        @endif

        @if (!empty($assessment->oropfafns3) && file_exists(public_path($assessment->oropfafns3)) && $assessment->training_status3 !== 'scholar')
            <a href="{{ asset($assessment->oropfafns3) }}" target="_blank" class="view-file">Official Receipt of Payment for Assessment for Non-Scholar 3</a><br>
        @else

        @endif

        @if (!empty($assessment->sopcctvr3) && file_exists(public_path($assessment->sopcctvr3)))
            <a href="{{ asset($assessment->sopcctvr3) }}" target="_blank" class="view-file">Submission of Previous CCTV Recordings 3</a><br>
        @else

        @endif


        @if (!empty($assessment->eltt4) && file_exists(public_path($assessment->eltt4)))
            <a href="{{ asset($assessment->eltt4) }}" target="_blank" class="view-file">Endorsement Letter To TESDA 4</a><br>
        @else

        @endif
   
        @if (!empty($assessment->rfftp4) && file_exists(public_path($assessment->rfftp4)))
            <a href="{{ asset($assessment->rfftp4) }}" target="_blank" class="view-file">Request Form For Test Package 4</a><br>
        @else

        @endif

        @if (!empty($assessment->oropfafns4) && file_exists(public_path($assessment->oropfafns4)) && $assessment->training_status4 !== 'scholar')
            <a href="{{ asset($assessment->oropfafns4) }}" target="_blank" class="view-file">Official Receipt of Payment for Assessment for Non-Scholar 4</a><br>
        @else

        @endif
  
        @if (!empty($assessment->sopcctvr4) && file_exists(public_path($assessment->sopcctvr4)))
            <a href="{{ asset($assessment->sopcctvr4) }}" target="_blank" class="view-file">Submission of Previous CCTV Recordings 4</a><br>
        @else

        @endif

    </td>
</tr>
@if (Auth::user()->role === 'admin')
<th class="title">Change Status  To</th>
<td>

<form action="{{ route('assessments.update', $assessment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>
        <input type="checkbox" name="status" value="approved" 
            {{ $assessment->status == 'approved' ? 'checked' : '' }}
            onchange="handleCheckboxChange(this)">
        Approved
    </label>
    &nbsp; &nbsp;
    <label>
        <input type="checkbox" name="status" value="disapproved" 
            {{ $assessment->status == 'disapproved' ? 'checked' : '' }}
            onchange="handleCheckboxChange(this)">
            Disapproved
    </label>
</form>

<script>
    function handleCheckboxChange(checkbox) {
        // If one checkbox is checked, uncheck the other
        if (checkbox.value == 'approved') {
            document.querySelector('input[name="status"][value="disapproved"]').checked = false;
        } else if (checkbox.value == 'disapproved') {
            document.querySelector('input[name="status"][value="approved"]').checked = false;
        }

        // Submit the form after selection
        checkbox.form.submit();
    }
</script>
</td>
</tr>
@endif
    </table><br>
    @endif

    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
