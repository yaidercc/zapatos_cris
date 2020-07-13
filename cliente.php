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

            <!--botones izquierdos del header-->
            <div class="botones-header">
                <?php
                include 'php/conexion.php';
                $curp = $_SESSION['data']['PRIMER_NOMBRE'];
                ?>
                <h2><?php echo $curp ?></h2>
                <button><i class="fas fa-bell"></i></button>
                <button><a href="php/logout.php"><i title="cerrar sesion"class="fas fa-sign-out-alt"></i></a></button>
            </div>
        </header>

        <!--numero de contacto-->
        <div class="contacto">
            <strong><p>contacto: 3058995646</p></strong>
        </div>
        <!--menu lateral-->

        <!--contenido principal-->
        <main class="main">

            <h3 class="titulos">PRODUCTOS</h3>
            <div class="container">
            <?php
                include 'php/conexion.php';//incluye la conexion a la base de datos
                $query="SELECT * from productos";//trae los datos que coincidan con la busqueda
                $result=mysqli_query($conexion,$query);//ejecuta la consulta
                while ($mostrar=mysqli_fetch_array($result)) {//crea un array llamado mostrar con los datos de la consulta
                    ?>
                    <div class="producto">
                        <div class="img">
                            <?php
                                echo '<img src="'.$mostrar["IMAGEN"].'" width="100" heigth="100"><br>';
                            ?>
                        </div>
                        <strong><p class="desc"><?php echo $mostrar['NOMBRE_PRODUCTO']?></p></strong>
                        <p class="genero" id="genero: "><?php echo $mostrar['ID_GENERO_FK']?></p>
                        <p class="genero"><strong>unidades disponibles: </strong>
                            <?php
                            if($mostrar['CANTIDAD']>0){
                                echo $mostrar['CANTIDAD'];
                            }else{
                                echo "agotados";
                            }
                            ?>
                            </p></br>
                        <p class="genero"><strong>precio: </strong>$<?php echo $mostrar['PRECIO']?></p>
                        <?PHP echo "<a class='btn' href='comprar.php?no=".$mostrar['ID_PRODUCTO']."''>SOLICITAR</a>";?>
                    </div>
            <?php
            }
            ?>
            </div>
        </main>
        
        </div>

    </div>
    
  
    <script src='javaScript/main.js'></script> 
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    
</body>
</html>