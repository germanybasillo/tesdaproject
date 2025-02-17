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
            /* margin: 20px; */
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            margin-right: 15px;
        }
        select, input[type="date"] {
            padding: 8px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
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
        /* tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9ecef;
        } */
        p {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        /* Style for the small button */
.small-btn {
    padding: 5px 10px; /* Small padding for the button */
    background-color: white; /* White background color */
    border: 1px solid #007bff; /* Blue border */
    border-radius: 5px; /* Rounded corners */
    color: #007bff; /* Blue text color */
    font-size: 14px; /* Smaller text size */
    cursor: pointer; /* Change cursor to pointer on hover */
    text-align: center; /* Center the text */
    display: inline-flex;
    align-items: center; /* Align the icon and text vertically */
    justify-content: center; /* Center the content horizontally */
}

/* Change background color on hover */
.small-btn:hover {
    background-color: #007bff; /* Blue background on hover */
    color: white; /* White text color on hover */
}

 /* Custom Background Colors */
 .pending {
            background-color: #28a745; /* Green */
            color: white;
        }
        .approved {
            background-color: #007bff; /* Blue */
            color: white;
        }
        .returned {
            color: red;
        }

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
        .pagination .active {
            background-color: #0056b3;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- <h2>Assessment List</h2> -->
    
    <!-- <label>Category:
        <select>
            <option>Select Category</option>
        </select>
    </label>
    <label>Title:
        <select>
            <option>Select Title</option>
        </select>
    </label> -->

   <!-- Filter Form -->
<form method="GET" action="{{ route('dashboard') }}" id="filterForm">
    <label>Status:
        <select name="status" onchange="document.getElementById('filterForm').submit()">
            <option value="">Select Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Returned</option>
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
            <th>Name of TVI</th>
            <th>Region</th>
            <th>Province</th>
            <th>Submitted By</th>
            <th>Date Submitted</th>
            <th>Status</th>
            <th>Qualification</th>
            <th>No of Pax</th>
            <th>Training of Status</th>
            <th>Type of Scholar</th>
            <th>Action</th>
        </tr>
        @foreach ($assessments as $assessment)
        <tr class="{{ 
                $assessment->status == 'pending' ? 'pending' : 
                ($assessment->status == 'approved' ? 'approved' : 
                ($assessment->status == 'returned' ? 'returned' : ''))
            }}">
            <td>{{$assessment->id}}</td>
            <td>{{$assessment->assessment_date}}</td>
            <td>{{$assessment->user->name}}</td>
            <td>Region XI - Davao</td>
            <td>Davao del Norte</td> <!-- This is the province you're asking to set as "4" -->
            <td>{{$assessment->user->name}} ({{$assessment->user->email}})</td>
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
            <td>
                <a href="{{ url('/one/' . $assessment->id) }}" target="_blank">
                <button class="small-btn">
        <i class="fa fa-eye"></i> View
    </button>
                </a><br>

                @if($assessment->qualification2 !== 'N/A')
                <a href="{{ url('/two/' . $assessment->id) }}" target="_blank">
                <button class="small-btn">
        <i class="fa fa-eye"></i> View
    </button>
                </a><br>
                @endif

                @if($assessment->qualification3 !== 'N/A')
                <a href="{{ url('/three/' . $assessment->id) }}" target="_blank">
                <button class="small-btn">
        <i class="fa fa-eye"></i> View
    </button>
                </a><br>
                @endif

                @if($assessment->qualification4 !== 'N/A')
                <a href="{{ url('/four/' . $assessment->id) }}" target="_blank">
                <button class="small-btn">
        <i class="fa fa-eye"></i> View
    </button>
                </a>
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
        <tr>
            <th>Total Assessment</th>
            <td>{{ $assessments->total() }}</td> <!-- Display total number of assessments -->
        </tr>
        <tr>
            <th>Legend</th>
            <td>
                <span class="pending">pending         ({{ $pendingCount }})</span><br>
                <span class="approved">approved       ({{ $approvedCount }})</span><br>
                <span class="returned">returned       ({{ $returnedCount }})</span>
            </td>
        </tr>
    </table>
    
    </x-app-layout>