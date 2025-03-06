<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <style>
            body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        margin-right: 10px;
        font-weight: bold;
        display: block;
    }

    select, input[type="date"] {
        padding: 8px;
        margin: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%; /* Make inputs responsive */
        max-width: 250px; /* Limit input width */
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    /* Make table responsive */
    @media (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto; /* Enable horizontal scrolling */
            white-space: nowrap;
        }
    }

    /* Button Styling */
    .button-style {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        text-align: center;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        width: 100%; /* Make button responsive */
        max-width: 250px;
    }

    .button-style:hover {
        background-color: #0056b3;
    }

    /* Small Button */
    .small-btn {
        padding: 5px 10px;
        background-color: white;
        border: 1px solid #007bff;
        border-radius: 5px;
        color: #007bff;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .small-btn:hover {
        background-color: #007bff;
        color: white;
    }

    /* Status Styles */
    .pending {
        color: #856404;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 4px;
        background-color: #fff3cd;
        transition: background-color 0.3s ease;
    }

    .approved {
        color: #155724;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 4px;
        background-color: #d4edda;
        transition: background-color 0.3s ease;
    }

    .disapproved {
        color: red;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 4px;
        background-color: #f8d7da;
        transition: background-color 0.3s ease;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        padding: 8px 16px;
        margin: 0 4px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .pagination a:hover {
        background-color: #0056b3;
    }

    /* Responsive Layout */
    @media (max-width: 600px) {
        .pagination {
            flex-direction: column;
            align-items: center;
        }

        select, input[type="date"], .button-style {
            max-width: 100%;
        }
    }

    </style>
</head>
<body>

<form method="GET" action="{{ route('dashboard') }}" id="filterForm">
    <label>Status:
        <select name="status" onchange="document.getElementById('filterForm').submit()">
            <option value="">Select Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="disapproved" {{ request('status') == 'disapproved' ? 'selected' : '' }}>Disapproved</option>
        </select>
    </label>

    <label>Date Submitted:
        <input type="date" name="date_submitted" value="{{ request('date_submitted') }}" onchange="document.getElementById('filterForm').submit()">
    </label>
</form>
    
    <table>
        <tr>
            <th>Assessment ID #</th>
            <th>Assessment Date</th>
            @if (Auth::user()->role === 'admin')
            <th>Name of TVI</th>
            @endif
            <th>Region</th>
            <th>Province</th>
            @if (Auth::user()->role === 'admin')
            <th>Submitted By</th>
            @endif
            <th>Date Submitted</th>
            <th>Status</th>
            <th>Qualification</th>
            <th>No of Pax</th>
            <th>Training of Status</th>
            <th>Type of Scholar</th>
        </tr>
        @foreach ($assessments as $assessment)
        <tr class="{{ 
                $assessment->status == 'pending' ? 'pending' : 
                ($assessment->status == 'approved' ? 'approved' : 
                ($assessment->status == 'disapproved' ? 'disapproved' : ''))
            }}">
            <td>{{$assessment->id}}</td>
            <td>{{$assessment->assessment_date}}</td>
            @if (Auth::user()->role === 'admin')
            <td>{{$assessment->user->name}}</td>
            @endif
            <td>Region XI - Davao</td>
            <td>Davao del Norte</td> <!-- This is the province you're asking to set as "4" -->
            @if (Auth::user()->role === 'admin')
            <td>{{$assessment->user->name}} ({{$assessment->user->email}})</td>
            @endif
            <td>{{ $assessment->created_at->timezone('Asia/Manila')->format('M d, Y - h:i A') }}</td>
            <td>{{$assessment->status}}</td>

            <td>{{$assessment->qualification}}<br>
            
            @if($assessment->qualification2 !== 'N/A')
                {{$assessment->qualification2}}<br>
            @endif
            
            @if($assessment->qualification3 !== 'N/A')
                {{$assessment->qualification3}}<br>
            @endif
            
            @if($assessment->qualification4 !== 'N/A')
                {{$assessment->qualification4}}<br>
            @endif
            </td>
            
            <td>{{$assessment->no_of_pax}}<br>

            @if($assessment->qualification2 !== 'N/A')
            {{$assessment->no_of_pax2}}<br>
            @endif

            @if($assessment->qualification3 !== 'N/A')
            {{$assessment->no_of_pax3}}<br>
            @endif

            @if($assessment->qualification4 !== 'N/A')
            {{$assessment->no_of_pax4}}
            @endif
            </td>
            
            <td>{{$assessment->training_status}}<br>

            @if($assessment->qualification2 !== 'N/A')
            {{$assessment->training_status2}}<br>
            @endif

            @if($assessment->qualification3 !== 'N/A')
            {{$assessment->training_status3}}<br>
            @endif

            @if($assessment->qualification4 !== 'N/A')
            {{$assessment->training_status4}}
            @endif
            </td>
            
            <td>{{$assessment->type_of_scholar}}<br>

            @if($assessment->qualification2 !== 'N/A')
            {{$assessment->type_of_scholar2}}<br>
            @endif

            @if($assessment->qualification3 !== 'N/A')
            {{$assessment->type_of_scholar3}}<br>
            @endif

            @if($assessment->qualification4 !== 'N/A')
            {{$assessment->type_of_scholar4}}
            @endif
            </td>
        </tr>
        @endforeach
    </table>

     <!-- Display Pagination -->
     <div class="pagination">
        {{ $assessments->links() }}
    </div>

    
     <!-- Display total counts and legend in table format -->
     <table>
     @if (Auth::user()->role === 'admin')
        <tr>
            <th>Total Assessment</th>
            <td>{{ $assessments->total() }}</td> <!-- Display total number of assessments -->
        </tr>
        @endif
        <tr>
            <th>Legend</th>
            <td>
                <span class="pending">pending         ({{ $pendingCount }})</span>
                <span class="approved">approved       ({{ $approvedCount }})</span>
                <span class="disapproved">disapproved       ({{ $disapprovedCount }})</span>
            </td>
        </tr>
    </table>
    
    </x-app-layout>
