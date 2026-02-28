<!DOCTYPE html>
<html>
<head>
    <title>All Bookings Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .header form button {
            padding: 8px 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .header form button:hover {
            background-color: #c82333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            text-align: center;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>All Bookings Report</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <table>
        <tr>
            <th>User</th>
            <th>Room</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Total Amount</th>
        </tr>

        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->user->name ?? 'Unknown User' }}</td>
            <td>{{ $booking->room->room_number }}</td>
            <td>{{ $booking->check_in }}</td>
            <td>{{ $booking->check_out }}</td>
            <td>{{ $booking->total_amount }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>