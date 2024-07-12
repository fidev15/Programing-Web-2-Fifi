<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <ul>
        @foreach ($mahasiswa as $item)
            <li> Nama : {{ $item->nama }} </li>
            <li> Email : {{ $item->email }} </li>
        @endforeach
    </ul>
</body>
</html>

