<!DOCTYPE html>
<html>
<head>
    <title>Anggota PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center;">Daftar Anggota</h1>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $a)
                <tr>
                    <td>{{ $a->username }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->jabatan }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
