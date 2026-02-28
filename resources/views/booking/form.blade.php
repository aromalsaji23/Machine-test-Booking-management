<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; 
        margin: 0;
    }

    .container {
        width: 100%;
        max-width: 500px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    .success-msg {
        color: green;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .booking-form {
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .booking-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    .booking-form input,
    .booking-form select,
    .booking-form button {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .booking-form input:focus,
    .booking-form select:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }

    .booking-form button {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .booking-form button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="header">
        <h2>Book a Room</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    @if(session('success'))
        <p class="success-msg">{{ session('success') }}</p>
    @endif

    <form class="booking-form" method="POST" action="/book/store">
        @csrf

        <label>Select Room</label>
        <select name="room_id" required>
            <option value="">-- Choose a Room --</option>
            @foreach($rooms as $r)
                <option value="{{ $r->id }}">Room {{ $r->room_number }} ({{ $r->type }} - ${{ $r->price }})</option>
            @endforeach
        </select>

        <label>Check In</label>
        <input type="date" name="check_in" required>

        <label>Check Out</label>
        <input type="date" name="check_out" required>

        <button type="submit">Book</button>
    </form>
</div>