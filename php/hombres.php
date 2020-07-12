<?php
    include 'conexion.php';
    $id=$_GET['no'];
    $eliminar ="SELECT * FROM productos WHERE ID_PRODUCTO='$id'";
    $resultado=mysqli_query($conexion,$eliminar);
    if(!$resultado){
        " <script language='JavaScript'>
            alert('no se pudo eliminar');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php');
        </script>";
        }
    header("location: http://localhost/Proyecto%20ppi/Aplicativo/administrador.php");


?>