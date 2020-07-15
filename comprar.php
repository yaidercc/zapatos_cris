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
        <!--cabecera-->
        <header class="header"> 
            <div class="contenedor-logo">
                <a href="#" class="logo"><h1>Calzado Cris</h1></a>
            </div>
            <div class="botones-header">
                <?php
                include 'php/conexion.php';
                $curp = $_SESSION['data']['PRIMER_NOMBRE'];
                ?>
                <h2><?php echo $curp ?></h2>
                <button><a href="php/logout.php"><i title="cerrar sesion"class="fas fa-sign-out-alt"></i></a></button>
            </div>
        </header>
        <div class="contacto">
            <strong><p>contacto: 3058995646</p></strong>
        </div>
            <script>
                 function calcular() {
                     ne=eval(document.getElementById('cantidad').value);
                     iv=eval(document.getElementById('total').value);
                     tiv = ne * iv;
                     document.getElementById('total').value=tiv;
                 }
            </script> 
            <!--contenido principal-->
            <main class="main">
                <div class="comprar">      
                    <?php
                        $id=$_GET['no'];
                        include 'php/conexion.php';//incluye la conexion a la base de datos
			            $query="SELECT * from productos WHERE ID_PRODUCTO=$id";//trae los datos que coincidan con la busqueda
                        $result=mysqli_query($conexion,$query);//ejecuta la consulta
                        while ($mostrar=mysqli_fetch_array($result)) {
                            $gen="SELECT * FROM generos WHERE ID_GENERO=$mostrar[ID_GENERO_FK]";
                            $genb=mysqli_query($conexion,$gen);
                            $auxx=mysqli_fetch_array($genb);
                            ?>
                            <form action="php/comprar_producto.php" method="POST"> 
                                <div class="productos">
                                    <div class="imgn">
                                        <?php
                                            echo '<img img="100px" src="'.$mostrar["IMAGEN"].'"><br>';
                                        ?>
                        
                                    </div>
                                    <div class="detalles">
                                        <strong><p class="desc">nombre del producto: </strong><?php echo $mostrar['NOMBRE_PRODUCTO']?></p>

                                        <input name="idusu" type="hidden" value="<?php echo $_SESSION['data']['ID_USUARIO']?>">
                                        <input name="idp" type="hidden" value="<?php echo $mostrar['ID_PRODUCTO']?>">
                                        <input name="precio" type="hidden" readonly="readonly" value="<?php echo $mostrar['PRECIO']?>">

                                        <p class="genero" id="genero: "><strong>genero:</strong> <?php echo $auxx['NOMBRE_GENERO']?></p>

                                        <p class="genero" name="cantidad" id="cantidad"><strong>unidades a comprar: </strong><input name="cantidad" type="text" value="1" required></p>

                                        <p class="genero" name="cantidad" id="cantidad"><strong>talla: </strong><input name="talla" placeholder="ingrese la talla" type="text" required></p>

                                        <p class="genero" id="total"><strong>precio unitario: </strong><?php echo $mostrar['PRECIO']?></p>

                                        <input type="submit" class="bont" value="solicitar">
                                        <?PHP echo "<a class='btn1' href='cliente.php'><h1>volver</h1></a>";?>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                </div>
        </main>
        <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    </div>
</body>
</html>