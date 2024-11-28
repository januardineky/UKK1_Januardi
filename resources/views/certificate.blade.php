<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin: 0;
        }
        .container {
            border: 5px solid #4CAF50;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            width: 80%;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 3em;
            margin-bottom: 0.5em;
            color: #4CAF50;
        }
        h2 {
            font-size: 2em;
            margin: 0.5em 0;
            color: #333;
        }
        p {
            font-size: 1.2em;
            margin: 0.5em 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
        .competency-info {
            margin: 20px 0;
            font-size: 1.2em;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #4CAF50;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- <img src="{{ asset('images/logo esemka.png') }}" alt=""> --}}
        <h1>Certificate of Completion</h1>
        <h2>This certifies that</h2>
        <p><strong>{{ $student->user->full_name }}</strong></p>
        <p>has successfully completed the following competency standard:</p>

        <div class="competency-info">
            <p><strong>Competency Standard:</strong> {{ $competencyStandard->unit_title }}</p>
            <p><strong>Score:</strong> {{ $percentage }}</p>
            <p><strong>Status:</strong> {{ $competencyLevel }}</p>
        </div>

        <h2>Examinations Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Elemen</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($examinations as $examination)
                    <tr>
                        <td>{{ $examination->competencyElement->criteria }}</td>
                        <td>{{ $examination->status == 1 ? 'Kompeten' : 'Belum Kompeten' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Issued on: {{ now()->format('d-m-Y') }}</p>
        </div>
    </div>
</body>
</html>
