<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Registro de creando academias</title>
</head>
<body>
    <p>Hola! se te esta enviando un email HIJO DE PUTA .</p>
    <p>Estos son los datos del usuario que se registro:</p>
    <ul>
        <li>ACADEMIA:{{$academia->nombre}} </li>       
    </ul>
    <p>Direccion de tu academia:</p>
    <ul>
        <p>Datos del Director</p>
        <li>Nombre:{{$academia->administrador['name']}}</li>
        <li>Apellido:{{$academia->administrador['last_name']}}</li>
        <li>Usuario:{{$academia->administrador['username']}}</li>
        <li>Telefono:{{$academia->administrador['telefono']}}</li>
        
    </ul>
</body>
</html>