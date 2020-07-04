
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>iniciar sesion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='Css/estilos.css'>
    
</head>
<body>
    <form class="formulario" method="POST" action="php/iniciar.php">
        <input type="text" placeholder="ingrese id" name="iduser">
        <input type=password placeholder="ingrese clave" name="clave">
        <input type="submit" value="entrar" name="butn">
    </form>
</body>
</html>