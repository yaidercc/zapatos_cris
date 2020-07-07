
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>pagina Principal</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='Css/estilos.css'>
    
</head>
<body>
    <div class="contenedor activate" id="contenedor"> 
        <header class="header"> 
            <div class="contenedor-logo">
                <button  id="boton-menu"class="boton-menu"><i class="fas fa-bars"></i></button>
                <a href="#" class="logo"><h1>Zapatos Cris</h1></a>
            </div>
            <!--<div class="barra-busqueda">
              <input type="text" placeholder="Buscar">
              <button type="submit"><i class="fas fa-search"></i></button>
            </div>-->
            <div class="botones-header">
                <a href="#" id="abrir" class="btns">INGRESAR</a>
            </div>

            <div class="registrar">
                <a href="#" id="opens" class="btns">REGISTRARSE</a>
            </div>
        </header>
        <div class="contacto">
            <strong><p></p></strong>
        </div>
        <nav class="menu-lateral">
        <ul>
            <li class="active">
                <a class="active" href="#"><img src="Css/img/hombre.png" height="50px"></i></a>
                <figcaption>CABALLEROS</figcaption>
            </li>
            <li>
                <a href="#"><img src="Css/img/mujer.png" height="50px"></i></a>
                <figcaption>DAMAS</figcaption>
            </li>
        </ul>


        </nav>
        <main class="main">
            <h3 class="titulos">PRODUCTOS</h3>
            <div class="container">
                <div class="producto">
                    <img class="img" src="Css/img/zapatos.jpg" >
                    <strong><p class="desc">zapatos op</p></strong>
                    <p class="genero" id="genero">hombre</p>
                    <p class="genero">unidades disponibles: </p>
                    <p class="genero">precio:</p>
                    <a href="#" id="solicitar"class="btn">SOLICITAR</a>
                </div>
            </div>
        </main>
        <!--Iniciar sesion-->
        <div id="overlay" class="overlay">
            <div class="popup" id="popup">
                <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
                <h3>INICIAR SESION</h3>
                <form method="POST" action="php/iniciar.php"> 
                <div class="contenedor-inputs">
                   <input type="text" placeholder="id usuario" name="iduser" required>
                   <input type="password" placeholder="clave" name="clave" required>
                </div>
               <input type="submit" value="ingresar" class="btn-submit">
           </form>
        </div>
        <!--registrarse-->
        <div id="overlays" class="overlays">
            <div class="popups" id="popups">
                <a href="#" id="btn-cerrar-popups" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
                <h3>REGISTRARSE</h3>
                <form method="POST" action="php/registrarse.php"> 
                <div class="contenedor-inputs">
                   <input type="text" placeholder="nombre usuario" name="iduser" required>
                   <input type="text" placeholder="identificacion" name="identificacion" required>
                   <input type="text" placeholder="primer nombre" name="nombre1" required>
                   <input type="text" placeholder="segundo nombre" name="nombre2" >
                   <input type="text" placeholder="primer apellido" name="apellido1" required>
                   <input type="text" placeholder="segundo apellido" name="apellido2" required>
                   <input type="text" placeholder="e-mail" name="correo" required>
                   <input type="text" placeholder="direccion de residencia" name="direccion" required>
                   <input type="text" placeholder="telefono de residencia" name="telefono" required>
                   <select name="genero" class="list" required>
                       <option>--seleccione genero--</option>
                        <?php
				 	    include 'php/conexion.php';
				 	    $consulta="SELECT * from generos";
				 	    $res=mysqli_query($conexion,$consulta);
				 	    while ($row=mysqli_fetch_array($res)) {
				 		    echo "<option>";
				 		    echo $row['NOMBRE_GENERO'];
				 		    echo "</option>";
				 	    }
				        ?>				 
                    </select>
                   <input type="password" placeholder="clave" name="clave" required>
                </div>
               <input type="submit" value="ingresar" class="btn-submit">
           </form>
        </div>
        
    </div>
</div>
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    <script src='javaScript/main.js'></script> 
</body>
</html>