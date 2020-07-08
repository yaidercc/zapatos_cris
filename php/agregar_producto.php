<?php
    include 'conexion.php';
    session_start();
    $IMAGEN=$_POST['img'];
    $NOMBRE=$_POST['namepro'];
    $GENERO=$_POST['genero'];
    $CANTIDAD=$_POST['cantidad'];
    $PRECIO=$_POST['preciou'];
    $random=rand(123344, 199995);
    if(isset($NOMBRE) and $CANTIDAD>0 and $PRECIO>0){
        $CONSULTA="INSERT INTO `productos`(`ID_PRODUCTO`, `NOMBRE_PRODUCTO`, `IMAGEN`, `PRECIO`, `CANTIDAD`, `ID_GENERO_FK`) VALUES ('$random','$NOMBRE','$IMAGEN','$PRECIO','$CANTIDAD',$GENERO)";
        $resultado=mysqli_query($conexion,$CONSULTA);
        if(!$resultado){
            echo " <script language='JavaScript'>
                alert('no se puedo agregar');
                location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php#');
            </script>";
        }else{
            echo " <script language='JavaScript'>
                alert('producto agregado');
                location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php#');
            </script>";
        }
    }else{
        echo " <script language='JavaScript'>
        alert('error al agregar este producto');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/administrador.php#');
        </script>";
    }
  
?>