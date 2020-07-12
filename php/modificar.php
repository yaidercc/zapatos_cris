<?php
    include 'conexion.php';
    $nombre=$_POST['nombre'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];
    $id=$_GET['no'];
    if(isset($nombre) and isset($cantidad) and isset($precio)){
        $eliminar ="UPDATE productos SET NOMBRE_PRODUCTO='$nombre' CANTIDAD='$cantidad' PRECIO='$precio' WHERE ID_PRODUCTO='$id'";
        $resultado=mysqli_query($conexion,$eliminar);
        if(!$resultado){
            " <script language='JavaScript'>
            alert('no se pudo eliminar');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php');
            </script>";
        }
        header("location: http://localhost/Proyecto%20ppi/Aplicativo/administrador.php");
    }
?>