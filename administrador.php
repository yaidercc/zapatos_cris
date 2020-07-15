<?php
    session_start();
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Zapatos Cris</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='Css/estilos.css'>
</head>
<body>
    <div class="contenedor activate" id="contenedor"> 
        <header class="header"> 
            <div class="contenedor-logo">
                <a href="#" class="logo"><h1>Calzado Cris</h1></a>
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
                <button><a href="#" id="btn"><i title="notificaciones"  class="fas fa-bell"></i></a></button>
                <button><a href="#" id="abrir" class="agg"><i class="far fa-plus-square"></i></a></button>
                <button><a href="php/logout.php"><i title="cerrar sesion"class="fas fa-sign-out-alt"></i></a></button>

                
            </div>
        </header>
        <div class="contacto">
            <strong><p></p></strong>
        </div>
        <!--menu de navegacion-->
        <main class="main">
            <h3 class="titulos">PRODUCTOS</h3>
            <div class="container">
            
                
                <?php
                    include 'php/conexion.php';//incluye la conexion a la base de datos
			        $query="SELECT * from productos";//trae los datos que coincidan con la busqueda
                    $result=mysqli_query($conexion,$query);//ejecuta la consulta
                    while ($mostrar=mysqli_fetch_array($result)) {
                        $gen="SELECT * FROM generos WHERE ID_GENERO=$mostrar[ID_GENERO_FK]";
                        $genb=mysqli_query($conexion,$gen);
                        $auxx=mysqli_fetch_array($genb);
                        ?>
                        <form action="php/modificar.php" method="POST">  
                            
                            <div class="producto">
                                <?php
                                    echo '<img  src="'.$mostrar["IMAGEN"].'"><br>';
                                ?>
                                <input type="hidden" name="idsp" value="<?php echo $mostrar['ID_PRODUCTO'] ?>">
                                <strong><p class="desc"><input name="nombre" type="text" value="<?php echo $mostrar['NOMBRE_PRODUCTO']?>"></p></strong>
                                <p class="genero" id="genero: "><?php echo $auxx['NOMBRE_GENERO']?></p>
                                <p class="genero"><strong>unidades disponibles: </strong><input name="cantidad" type="text" value="<?php echo $mostrar['CANTIDAD']?>"></p>
                                <p class="genero"><strong>precio: </strong><input name="precio" type="text" value="<?php echo $mostrar['PRECIO']?>"></p>
                                <input type="submit" class="btn" value="modificar">
                                <?PHP echo "<a class='btn1' href='php/eliminar.php?no=".$mostrar['ID_PRODUCTO']."''>ELIMINAR</a>";?>
                                </div>
                        </form>
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
                <form method="POST" action="agregar_producto.php" enctype="multipart/form-data">  
                <div class="contenedor-inputs">
                    <input type="file" name="foto">
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
                    </div>
        <!---editar producto--> 
        <div id="overlay2" class="overlay">
            <div class="popup" id="popup2">
                <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
                <h3>PRODUCTOS VENDIDOS</h3>
                <scroll-container> 
                <?php
                    include 'php/conexion.php';//incluye la conexion a la base de datos
			        $querys="SELECT * from detalle_compras where pagado=0";//trae los datos que coincidan con la busqueda
                    $resu=mysqli_query($conexion,$querys);//ejecuta la consulta
                    while ($mostrar=mysqli_fetch_array($resu)) {
                        $produc="SELECT NOMBRE_PRODUCTO FROM productos WHERE ID_PRODUCTO=$mostrar[ID_PRODUCTO_FK]";
                        $traer=mysqli_query($conexion,$produc);
                        $vista=mysqli_fetch_array($traer);
                        $enca="SELECT *  FROM encabezado_ventas WHERE NRO_FACTURA=$mostrar[NRO_FACTURA_FK]";
                        $encab=mysqli_query($conexion,$enca);
                        $encabe=mysqli_fetch_array($encab);
                        $cliente="SELECT *  FROM usuarios WHERE ID_USUARIO=$encabe[ID_USUARIO_FK]";
                        $buscar=mysqli_query($conexion,$cliente);
                        $view=mysqli_fetch_array($buscar);
                        ?>
                            
                                <form action="php/pagar.php" method="POST">
                                <scroll-page>
                                    <div class="pendientes">
                                        <input type="hidden" name="idsc" value="<?php echo $mostrar['ID_COMPRA'] ?>">
                                        <p class="desc"><strong>NOMBRE COMPRADOR: </strong> <?php echo $view['PRIMER_NOMBRE']?></p>
                                        <p class="desc"><strong>NOMBRE PRODUCTO: </strong> <?php echo $vista['NOMBRE_PRODUCTO']?></p>
                                        <p class="desc"><strong>TALLA: </strong> <?php echo $mostrar['TALLAS']?></p>
                                        <p class="desc"><strong>DIRECCION: </strong> <?php echo $view['DIRECCION']?></p>
                                        <p class="desc"><strong>TELEFONO: </strong> <?php echo $view['TELEFONO']?></p>
                                        <p class="desc"><strong>CANTIDAD :</strong> <?php echo $mostrar['CANTIDAD']?></p>
                                        <p class="desc"><strong>TOTAL :</strong> <?php echo $mostrar['TOTAL']?></p>                               
                                        <input type="submit" class="btn-submit" value="entregado"> 
                                    </div>
                                    </scroll-page>

                                </form>
                    
                    <?php
				    }
                    ?>
                    </scroll-container> 
        </div>
    </div>
    <script src='javaScript/main.js'></script> 
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <!--<script type="text/javascript" src="javaScript/ajax.js"></script>-->

</body>
</html>