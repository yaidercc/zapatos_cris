
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
                <h2>CRISTIAN</h2>
                <button><i class="fas fa-bell"></i></button>
                
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
            
           <li>
                <a href="#"><img src="Css/img/zapato.png" height="50px"></i></a>
                <figcaption>AGREGAR PRODUCTO</figcaption>
            </li>
            
            <li>
                <a href="php/logout.php"><img src="Css/img/cerrar sesion.png" height="50px"></i></a>
                <figcaption>CERRAR SESION</figcaption>
            </li>
            </ul>


        </nav>
        <main class="main">
            <h3 class="titulos">PRODUCTOS</h3>
            <div class="container">
                
                <?php
			        include 'php/conexion.php';//incluye la conexion a la base de datos
			        $query="SELECT * from productos where cantidad>0";//trae los datos que coincidan con la busqueda
                    $result=mysqli_query($conexion,$query);//ejecuta la consulta
			        while ($mostrar=mysqli_fetch_array($result)) {//empieza a recorer e imprimir los datos encontrados
				    ?>
				        <div class="producto">
                            <img class="img" src="Css/img/zapatos.jpg" >
                            <strong><p class="desc"><?php echo $mostrar['NOMBRE_PRODUCTO']?></p></strong>
                            <p class="genero" id="genero"><?php echo $mostrar['ID_GENERO_FK']?></p>
                            <p class="genero">unidades disponibles:<?php echo $mostrar['CANTIDAD']?> unidades</p>
                            <p class="genero">precio: $<?php echo $mostrar['PRECIO']?></p>
                            <a href="login.php" class="btn">SOLICITAR</a>
                        </div>
				<?php
				}
				?>
                    
            </div>
        </main>
    </div>
    <script src='javaScript/main.js'></script> 
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    
</body>
</html>