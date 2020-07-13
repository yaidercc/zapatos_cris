<?php
    include 'conexion.php';
    $idcom=$_POST['idsc'];
    $pagado="UPDATE detalle_compras SET pagado=1 WHERE ID_COMPRA=$idcom";
    $resultado=mysqli_query($conexion,$pagado);

    if($resultado){
        echo " <script language='JavaScript'>
        alert('se pudo modificar');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php');
        </script>";
    }else{
        echo " <script language='JavaScript'>
        alert('no se pudo modificar');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php');
        </script>";
    }
?>