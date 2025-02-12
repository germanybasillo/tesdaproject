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
        /* * {
            box-sizing: border-box;
        } */

        /* html, body {
            padding: 0;
            margin: 0;
        } */

        /* body {
            font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", "Roboto", "Oxygen", 
            "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", "Helvetica", 
            "Arial", sans-serif;
            padding: 20px;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #6c7ae0;
            color: white;
            font-weight: normal;
            font-size: 1.1rem;
        }

        thead tr:first-child th {
            background: #4a5fc1;
            font-weight: bold;
        }

        tbody td {
            color: #808080;
        }

        /* tr:nth-child(even) td {
            background: #f8f6ff;
        } */
        .button{
            background-color:blue;
            color:white;

        }
    </style>
</head>
<body>

@foreach ($assessments as $assessment)
<table>
    <thead>
        <tr>
            <th>No: {{$assessment->id}}</th>
            <th>Assessment of Date: {{$assessment->assessment_date}}</th>
            <th style="background-color: {{ $assessment->status === 'pending' ? 'red' : '#6c7ae0' }}; color: white;">
                Status: {{ $assessment->status }}
            </th>
            <th>Submitted by: {{$assessment->user->name}} ({{$assessment->user->email}})</th>
        </tr>
        <tr>
            <th>Qualification</th>
            <th>Number of Pax</th>
            <th>Training Status</th>
            <th>Type of Scholar</th>
             @if (Auth::user()->role === 'admin')
            <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if($assessment->qualification !== 'N/A')
        <tr>
            <td>{{$assessment->qualification}}</td>
            <td>{{$assessment->no_of_pax}}</td>
            <td>{{$assessment->training_status}}</td>
            <td>{{$assessment->type_of_scholar}}</td>
            @if (Auth::user()->role === 'admin')
            <td class="button">
                <a href="{{ url('/one/' . $assessment->id) }}" target="_blank" data-id="{{ $assessment->id }}">
                    <i class="fa fa-eye"></i> View
                </a>
            </td>
            @endif
        </tr>
        @endif

        @if($assessment->qualification2 !== 'N/A')
        <tr>
            <td>{{$assessment->qualification2}}</td>
            <td>{{$assessment->no_of_pax2}}</td>
            <td>{{$assessment->training_status2}}</td>
            <td>{{$assessment->type_of_scholar2}}</td>
            @if (Auth::user()->role === 'admin')
            <td class="button">
                <a href="{{ url('/one/' . $assessment->id) }}" target="_blank" data-id="{{ $assessment->id }}">
                    <i class="fa fa-eye"></i> View
                </a>
            </td>
            @endif
        </tr>
        @endif

        @if($assessment->qualification3 !== 'N/A')
        <tr>
            <td>{{$assessment->qualification3}}</td>
            <td>{{$assessment->no_of_pax3}}</td>
            <td>{{$assessment->training_status3}}</td>
            <td>{{$assessment->type_of_scholar3}}</td>
            @if (Auth::user()->role === 'admin')
            <td class="button">
                <a href="{{ url('/one/' . $assessment->id) }}" target="_blank" data-id="{{ $assessment->id }}">
                    <i class="fa fa-eye"></i> View
                </a>
            </td>
            @endif
        </tr>
        @endif

        @if($assessment->qualification4 !== 'N/A')
        <tr>
            <td>{{$assessment->qualification4}}</td>
            <td>{{$assessment->no_of_pax4}}</td>
            <td>{{$assessment->training_status4}}</td>
            <td>{{$assessment->type_of_scholar4}}</td>
            @if (Auth::user()->role === 'admin')
            <td class="button">
                <a href="{{ url('/one/' . $assessment->id) }}" target="_blank" data-id="{{ $assessment->id }}">
                    <i class="fa fa-eye"></i> View
                </a>
            </td>
            @endif
        </tr>
        @endif
    </tbody>
</table>
@endforeach
        


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
