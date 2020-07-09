<?php
    include 'conexion.php';
    $SELECT=$_POST['productos'];
    $PRODUCTO=$_POST['namepro'];
    $CANTIDAD=$_POST['cantidad'];
    $PRECIO=$_POST['preciou'];
    if($PRODUCTO OR $CANTIDAD OR $PRECIO){
        $CONSULTA="UPDATE `productos` SET `NOMBRE_PRODUCTO`=$PRODUCTO,`PRECIO`=$PRECIO,`CANTIDAD`=$CANTIDAD, WHERE NOMBRE_PRODUCTO=$SELECT";
        $RESULTADO=mysqli_query($conexion,$CONSULTA);
        if($RESULTADO){
            echo " <script language='JavaScript'>
            alert('su producto se editÓ existosamente');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php#');
            </script>";
            
        }else{
            echo " <script language='JavaScript'>
            alert('ocurrio un error al editar producto');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php#');
            </script>";
        }
    }else{
        echo " <script language='JavaScript'>
        alert('no se puede editar ya que los cajones estan vacios');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php#');
        </script>";
    }
    
?>