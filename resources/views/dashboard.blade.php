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

    @if (Auth::user()->role === 'user')
    <label>Add New:
    <a href="#" class="primary button-style" onclick="openModal(event)">Request Assessment</a>
</label>
@endif
</form>


<!-- Modal -->
<div id="assessmentModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-4 rounded-lg shadow-lg max-w-2xl max-h-[90vh] overflow-y-auto relative">
        <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8 text-gray-900 dark:text-gray-100 relative">
                <!-- Close Button -->
                <button onclick="closeModal()" class="absolute top-3 right-4 text-white font-bold text-2xl">
                    &times;
                </button>
                    @include('qualification.one')
            </div>
        </div>
    </div>
</div>



<!-- JavaScript -->
<script>
    function openModal(event) {
        event.preventDefault(); // Prevents page from refreshing
        document.getElementById("assessmentModal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("assessmentModal").classList.add("hidden");
    }
</script>


    
@php
    $hasScholar = $assessments->contains('training_status', 'scholar');
    $hasNonScholar = $assessments->contains('training_status', 'non_scholar');
@endphp

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
            <th>Type of Scholar / Non Scholar</th>
            <th>Action</th>
        </tr>
        @if($assessments->isEmpty())
        <tr>
    <td colspan="11" style="text-align: center; font-weight: bold; padding: 20px;">No records found.</td>
</tr>


        @else
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

            <td>
    @php
        $qualifications = [$assessment->qualification];

        if ($assessment->qualification2 !== 'N/A') {
            $qualifications[] = $assessment->qualification2;
        }

        if ($assessment->qualification3 !== 'N/A') {
            $qualifications[] = $assessment->qualification3;
        }

        if ($assessment->qualification4 !== 'N/A') {
            $qualifications[] = $assessment->qualification4;
        }
    @endphp

    {!! implode('<br>', array_filter($qualifications)) !!}
</td>
            
            <td>
    @php
        $paxNumbers = [$assessment->no_of_pax];

        if ($assessment->qualification2 !== 'N/A') {
            $paxNumbers[] = $assessment->no_of_pax2;
        }

        if ($assessment->qualification3 !== 'N/A') {
            $paxNumbers[] = $assessment->no_of_pax3;
        }

        if ($assessment->qualification4 !== 'N/A') {
            $paxNumbers[] = $assessment->no_of_pax4;
        }
    @endphp

    {!! implode('<br>', array_filter($paxNumbers)) !!}
</td>
            
            <td>
    @php
        $statuses = [$assessment->training_status];

        if ($assessment->qualification2 !== 'N/A') {
            $statuses[] = $assessment->training_status2;
        }

        if ($assessment->qualification3 !== 'N/A') {
            $statuses[] = $assessment->training_status3;
        }

        if ($assessment->qualification4 !== 'N/A') {
            $statuses[] = $assessment->training_status4;
        }
    @endphp

    {!! implode('<br>', array_filter($statuses)) !!}
</td>

        
            
            <td>
    @php
        $rows = [];

        if (!empty($assessment->mix_no)) {
            $rows[] = "{$assessment->mix_no} - {$assessment->type_of_scholar} / " . (10 - $assessment->mix_no) . " - {$assessment->type_of_non_scholar}";
        } else {
            $rows[] = $assessment->type_of_scholar;
            $rows[] = $assessment->type_of_non_scholar;
        }

        if (!empty($assessment->mix_no2) && $assessment->qualification2 !== 'N/A') {
            $rows[] = "{$assessment->mix_no2} - {$assessment->type_of_scholar2} / " . (10 - $assessment->mix_no2) . " - {$assessment->type_of_non_scholar2}";
        } else {
            $rows[] = $assessment->type_of_scholar2;
            $rows[] = $assessment->type_of_non_scholar2;
        }

        if (!empty($assessment->mix_no3) && $assessment->qualification3 !== 'N/A') {
            $rows[] = "{$assessment->mix_no3} - {$assessment->type_of_scholar3} / " . (10 - $assessment->mix_no3) . " - {$assessment->type_of_non_scholar3}";
        } else {
            $rows[] = $assessment->type_of_scholar3;
            $rows[] = $assessment->type_of_non_scholar3;
        }

        if (!empty($assessment->mix_no4) && $assessment->qualification4 !== 'N/A') {
            $rows[] = "{$assessment->mix_no4} - {$assessment->type_of_scholar4} / " . (10 - $assessment->mix_no4) . " - {$assessment->type_of_non_scholar4}";
        } else {
            $rows[] = $assessment->type_of_scholar4;
            $rows[] = $assessment->type_of_non_scholar4;
        }
    @endphp

    {!! implode('<br>', array_filter($rows)) !!}
</td>

    


        <td>
        <a href="{{ url('/view/' . $assessment->id) }}" target="_blank">
            <button class="small-btn">
                <i class="fa fa-eye"></i>
            </button>
        </a>
        <a href="#"onclick="openEditModal(event)">
    <button class="small-btn">
        <i class="fa-solid fa-edit"></i>
    </button>
</a>

<!-- Modal -->
<div id="assessmenteditModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-4 rounded-lg shadow-lg max-w-2xl max-h-[90vh] overflow-y-auto relative">
        <div class="bg-blue-500 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-8 text-gray-900 dark:text-gray-100 relative">
                <!-- Close Button -->
                <button onclick="closeEditModal()" class="absolute top-3 right-4 text-white font-bold text-2xl">
                    &times;
                </button>
                    @include('qualification.edit')
            </div>
        </div>
    </div>
</div>



<!-- JavaScript -->
<script>
    function openEditModal(event) {
        event.preventDefault(); // Prevents page from refreshing
        document.getElementById("assessmenteditModal").classList.remove("hidden");
    }

    function closeEditModal() {
        document.getElementById("assessmenteditModal").classList.add("hidden");
    }
</script>



    </td>
        </tr>
        @endforeach
        @endif
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