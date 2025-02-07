<x-document-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
    </style>
</head>
<body>
<h2>Qualification Details</h2>
@if ($assessment)
    <table>
        <tr>
            <th class="title">ID</th>
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
            <td>{{ $assessment->created_at->format('M d, Y - h:i A') }}   </td>
        </tr>
        <tr>
            <th class="title">Last Update</th>
            <td>2/6/2025</td>
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
            <td class="status">{{$assessment->status}}</td>
        </tr>
        <tr>
            <th class="title">Description</th>
            <td class="description">
                Good day Ma'am/Sir,<br><br>
                I would like to request the correction of our trainee's "Classification of Clients".<br><br>
                Name: MAGIROSE MARSULA FLORES<br>
                ULI: FMM-84-848-11023-001<br>
                FROM: OTHERS<br>
                TO: GOVERNMENT EMPLOYEE<br><br>
                Thank you very much.<br><br>
                Attached is her LGU-ID for your reference.<br>
                Hoping for your kind consideration in this matter.
            </td>
        </tr>
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
