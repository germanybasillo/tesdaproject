<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment of Assessors</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>TESDA-OP-CO-05-F36</h2>
    <p>Rev.No.00-03/08/17</p>
    <h2>ASSIGNMENT OF ASSESSORS</h2>

    <p><strong>For the month of:</strong> {{ now()->format('F Y') }}</p>

    <table>
        <tr>
            <th>Name of Assessor</th>
            <th>Assessment Center</th>
            <th>Date of Assessment</th>
            <th>Status</th>
        </tr>
        @foreach ($assessors as $assessor)
        <tr>
            <td>{{ $assessor->name }}</td>
            <td>{{ $assessor->assessment_center }}</td>
            <td>{{ $assessor->date_of_assessment }}</td>
            <td>{{ ucfirst($assessor->status) }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
