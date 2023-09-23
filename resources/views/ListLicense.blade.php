@extends('layouts.user_type.auth')

@section('content')
<style>
      table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Center the table */
        table {
            margin: 0 auto;
        }

        /* Center the h1 heading */
        h1 {
            text-align: center;
        }
</style>
    <h1>List of License Keys</h1>

    <table>
        <thead>
            <tr>
                <th>Key</th>
                <th>Tier</th>
                <th>Monthly Limit</th>
                <th>Expiration Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($licenseKeys as $licenseKey)
                <tr>
                    <td>{{ $licenseKey->key }}</td>
                    <td>{{ $licenseKey->tier }}</td>
                    <td>{{ $licenseKey->monthly_limit }}</td>
                    <td>{{ $licenseKey->expiry_date }}</td>
                    <td>{{ $licenseKey->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection