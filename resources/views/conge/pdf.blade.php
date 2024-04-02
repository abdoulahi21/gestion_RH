<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }


    </style>

</head>

<body>

<div style="width: 95%; margin: 0 auto;">
    <div style="width: 10%; float:left; margin-right: 20px;">

    </div>
    <div style="width: 50%; float: left;">
        <h1>All User Details</h1>
    </div>
</div>

<table style="position: relative; top: 50px;">
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Date Of Joining</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($conge as $ct)
        <tr>
            <td data-column="First Name">{{ $ct->type_conge }}</td>
            <td data-column="Last Name"></td>
            <td data-column="Email" style="color: dodgerblue;">
                {{ $ct->email }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>

</html>
