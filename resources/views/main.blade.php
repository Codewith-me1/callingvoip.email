<!-- resources/views/generate-key.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate License Key</title>
    @extends('layouts.user_type.auth')

@section('content')

<style>

.container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        /* Form styling */
        form {
            margin: 20px 0;
            display: inline-block;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select, input[type="date"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        .suspend{
            display: block;
        }
</style>
</head>
<body>

    <h1>Generate License Key</h1>
    @if(session('success'))
    <div>{{ session('success') }}</div>
@endif

    <form action="{{route('Name')}}" method="POST">
    {{ csrf_field() }}

        <label for="tier">Select Tier:</label>
        <select name="tier" id="tier">
            <option value="Tier 1">Tier 1</option>
            <option value="Tier 2">Tier 2</option>
            <option value="Tier 2">Tier 3</option>
            <option value="Tier 2">Custom</option>
            <!-- Add more tier options here as needed -->
        </select>

        <label for="monthly_limit">Expiry Date</label>
        <input type="date" name="expiry" id="monthly_limit" required>

        <label for="monthly_limit">Monthly Limit </label>
        <input type="number" name="monthly_limit" id="monthly_limit" required>

        <button type="submit">Generate Key</button>
    </form>



    <form class="suspend"action="{{ route('suspend-license-key')}}" method="POST">
    @csrf
    <input placeholder="Enter Key" type="text" name="licenseKey">
    <button type="submit">Suspend License Key</button>
</form>


</body>
</html>
@endsection