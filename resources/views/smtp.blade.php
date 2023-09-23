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

    <h1>SMTP Settings</h1>
    @if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<div class="container">
        <h1>Edit SMTP Settings</h1>

        <form  method="POST" action="/smtp-settings">
            @csrf
            @method('PUT')
            

            <div class="form-group">
                <label for="host">SMTP Host:</label>
                <input type="text" name="host" id="host" value="{{ $smtpSettings->host }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="port">SMTP Port:</label>
                <input type="number" name="port" id="port" value="{{ $smtpSettings->port }}" class="form-control" required>
            </div>  

            <div class="form-group">
                <label for="username">SMTP Username:</label>
                <input type="text" name="username" id="username" value="{{ $smtpSettings->username }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">SMTP Password:</label>
                <input type="password" name="password" id="password" value="{{ $smtpSettings->password }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Settings</button>
        </form>
    </div>






</body>
</html>
@endsection