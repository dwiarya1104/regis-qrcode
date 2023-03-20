<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $nama }}</h1>
    <img src="{{ public_path('storage/' . $foto_barcode) }}" alt="" height="500px" width="500px">
    <p>{{ $foto_barcode }}</p>
    <p>{{ $kelas }}</p>
</body>

</html>
