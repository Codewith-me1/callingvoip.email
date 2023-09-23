<!-- resources/views/generate-key.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate License Key</title>
</head>
<body>
    <h1>Generate License Key</h1>

    <form action="{{route('Name')}}" method="POST">
    {{ csrf_field() }}

        <label for="tier">Select Tier:</label>
        <select name="tier" id="tier">
            <option value="Tier 1">Tier 1</option>
            <option value="Tier 2">Tier 2</option>
            <!-- Add more tier options here as needed -->
        </select>

        <label for="monthly_limit">Expiry Date</label>
        <input type="date" name="expiry" id="monthly_limit" required>

        <label for="monthly_limit">Monthly Limit </label>
        <input type="number" name="monthly_limit" id="monthly_limit" required>

        <button type="submit">Generate Key</button>
    </form>
</body>
</html>
