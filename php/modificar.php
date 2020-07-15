<?php
    include 'conexion.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nombre=$_POST['nombre'];
        $cantidad=$_POST['cantidad'];
        $precio=$_POST['precio'];
        $producto=$_POST['idsp'];
    }
    $consulta="UPDATE `productos` SET `NOMBRE_PRODUCTO`='$nombre',`PRECIO`=$precio,`CANTIDAD`=$cantidad WHERE `ID_PRODUCTO`=$producto";
    $run=mysqli_query($conexion,$consulta);
    if(!$run){
        echo " <script language='JavaScript'>
        alert('error al modificar');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php');
        </script>";
    }else{
        echo " <script language='JavaScript'>
        alert('modificado con exito');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php');
        </script>";
    }
    
?>