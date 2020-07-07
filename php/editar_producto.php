<?php
    include 'php/conexion.php';

    $PRODUCTO=$_POST['namepro'];
    $CANTIDAD=$_POST['cantidad'];
    $PRECIO=$_POST['preciou'];

    $CONSULTA="UPDATE productos SET NOMBRE_PRODUCTO='$PRODUCTO' IMAGEN";
    $RESULTADO=mysqli_query($conexion,$CONSULTA);

?>