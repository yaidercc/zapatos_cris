<?php
    session_start();
?>
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
                <?php
                include 'php/conexion.php';
                $curp = $_SESSION['data']['PRIMER_NOMBRE'];
                ?>
                <h2><?php echo $curp ?></h2>
                <button><i class="fas fa-bell"></i></button>
                
            </div>
        </header>
        <div class="contacto">
            <strong><p></p></strong>
        </div>
        <!--menu de navegacion-->
        <nav class="menu-lateral">
        <ul>

            <li>
                <a  href="#"><img src="Css/img/hombre.png" height="50px"></i></a>
                <figcaption>CABALLEROS</figcaption>
            </li>
            <li>
                <a href="#"><img src="Css/img/mujer.png" height="50px"></i></a>
                <figcaption>DAMAS</figcaption>
            </li>
            
           <li>
                <a href="#" id="abrir"><img src="Css/img/zapato.png" height="50px"></i></a>
                <figcaption>AGREGAR PRODUCTO</figcaption>
            </li>

            <li>
                <a href="#" id="open"><img src="Css/img/editar.png" height="50px"></i></a>
                <figcaption>EDITAR PRODUCTO</figcaption>
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
                            <p class="genero">unidades disponibles:<?php echo $mostrar['CANTIDAD']?> </p>
                            <p class="genero">precio: $<?php echo $mostrar['PRECIO']?></p>
                             <a href="#" class="btn1">ELIMINAR</a>
                        </div>
				<?php
				}
				?>
                    
            </div>
        </main>
        </div>
        <!--agregar producto popup-->
        <div id="overlay" class="overlay ">
            <div class="popup" id="popup">
                <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
                <h3>AGREGAR PRODUCTO</h3>
                <form method="POST" action="php/agregar_producto.php"> 
                <div class="contenedor-inputs">
                    <input type="file" name="img">
                   <input type="text" placeholder="nombre del producto"  name="namepro" required>
                   <select name="genero" class="list" required>
                       <option>--seleccione genero--</option>
                        <?php
				 	    include 'php/conexion.php';
				 	    $consulta="SELECT * from generos";
				 	    $res=mysqli_query($conexion,$consulta);
				 	    while ($row=mysqli_fetch_array($res)) {
                            echo '<option value="'.$row['ID_GENERO'].'">'.$row['NOMBRE_GENERO'].'</option>';
				 	    }
				        ?>				 
                    </select> 		 
                   <input type="number" placeholder="cantidad disponibles" name="cantidad" required>
                   <input type="number" placeholder="precio unitario" name="preciou" required>
                </div>
               <input type="submit" value="agregar" class="btn-submit">
           </form>
        </div>

        <!---editar producto--> 
        <div id="overlay2" class="overlay">
            <div class="popup" id="popup2">
                <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
                <h3>EDITAR PRODUCTO</h3>
                <form method="POST" action="php/editar_producto.php"> 
                <div class="contenedor-inputs">	
                <form>
                    <select id='producto' >
                    <option>--seleccione producto--</option>
                        <?php
				 	    include 'php/conexion.php';
				 	    $consulta="SELECT * from productos";
				 	    $res=mysqli_query($conexion,$consulta);
				 	    while ($row=mysqli_fetch_array($res)) {
                            echo '<option value="'.$row['ID_PRODUCTO'].'">'.$row['NOMBRE_PRODUCTO'].'</option>';
				 	    }
				        ?>		
                    </select>
                    <input type="text" placeholder="nombre del producto"  id="nombre" name="namepro" required>
                    <input type="number" placeholder="cantidad disponibles"  id="cantidad" name="cantidad" required>
                    <input type="number" placeholder="precio unitario" id="precio" name="preciou" required>
                </div>
               <input type="submit" value="editar" class="btn-submit">
           </form>
        </div>
    </div>
    <script src='javaScript/main.js'></script> 
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script type="text/javascript" src="javaScript/ajax.js"></script>
    
</body>
</html>