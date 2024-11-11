
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<h1>Welcome to Our Restaurant</h1>
<h2>Table Availability</h2>

<div id="tables-availability">


    @foreach ($tables as $table)
        <div class="table">
            <h3>Table Number: {{ $table->number }}</h3>

            <!-- Check if this table is booked -->
            @if (in_array($table->id, $bookedTables))
                <p class="status booked">This table is already booked.</p>
            @else
                <p class="status available">This table is available.</p>
            @endif
        </div>
    @endforeach
</div>

<!-- Add some CSS for styling -->
<style>v
    #tables-availability {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .table {
        border: 1px solid #ccc;
        padding: 10px;
        width: 150px;
        text-align: center;
        border-radius: 8px;
    }

    .table h3 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .status {
        font-weight: bold;
    }

    .status.booked {
        color: red;
    }

    .status.available {
        color: green;
    }
</style>
