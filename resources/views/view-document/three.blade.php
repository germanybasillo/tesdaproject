<x-document-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                <title>Feedback Details</title>
    <style>
        table {
            width: 100%;
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
        <!-- <tr>
            <th class="title">Comment About His PDF</th>
            <td /*class="description"*/>
            @foreach($comments as $comment)
            <p style="color:red">{{ $comment->comment }}</p>
            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            @endforeach
            <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div style="display: flex; width: 100%; align-items: center;">
    <input name="comment" style="flex: 1; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Write a comment..." required>
    <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px;">Submit</button>
    </div>
        </form>
        </td>
        </tr> -->
        <tr>
    <th class="title">Attached File</th>
    <td>
    @if (!empty($assessment->eltt3) && file_exists(public_path($assessment->eltt3)))
            <a href="{{ asset($assessment->eltt3) }}" target="_blank" class="view-file">View PDF ELTT</a><br>
        @else
 
        @endif

    @if (!empty($assessment->rfftp3) && file_exists(public_path($assessment->rfftp3)))
            <a href="{{ asset($assessment->rfftp3) }}" target="_blank" class="view-file">View PDF RFFTP</a><br>
        @else
 
        @endif

    @if (!empty($assessment->oropfafns3) && file_exists(public_path($assessment->oropfafns3)))
            <a href="{{ asset($assessment->oropfafns3) }}" target="_blank" class="view-file">View PDF OROPFAFNS</a><br>
        @else
  
        @endif
  
    @if (!empty($assessment->sopcctvr3) && file_exists(public_path($assessment->sopcctvr3)))
            <a href="{{ asset($assessment->sopcctvr3) }}" target="_blank" class="view-file">View PDF SOPCCTVR</a><br>
        @else
      
        @endif
    </td>
</tr>

    </table><br>
    @endif

    

                </div>
            </div>
        </div>
    </div>
</x-document-layout>
