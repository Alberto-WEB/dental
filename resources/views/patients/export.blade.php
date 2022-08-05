<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
</head>
<body>
    <table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Direccion</th>
        <th>Estatus</th>
        <th>Religion</th>
        <th>Ocupacion</th>
        <th>Telefono</th>
    </tr>
    </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email_patient }}</td>
                <td>{{ $patient->age }}</td>
                <td>{{ $patient->sex }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->civil_status }}</td>
                <td>{{ $patient->religion }}</td>
                <td>{{ $patient->occupation }}</td>
                <td>{{ $patient->phone }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>