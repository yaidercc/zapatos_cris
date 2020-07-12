<?php
    require_once 'php/conexion.php';
    session_start();
    $NOMBRE=$_POST['namepro'];
    $GENERO=$_POST['genero'];
    $CANTIDAD=$_POST['cantidad'];
    $PRECIO=$_POST['preciou'];
    $foto=$_FILES["foto"]["name"];
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="fotos/".$foto;
    $rutiti=copy($ruta,$destino);
    $random=rand(123344, 199995);
    if(isset($NOMBRE) and $CANTIDAD>0 and $PRECIO>0){
        $CONSULTA="INSERT INTO `productos`(`ID_PRODUCTO`, `NOMBRE_PRODUCTO`, `IMAGEN`, `PRECIO`, `CANTIDAD`, `ID_GENERO_FK`) VALUES ('$random','$NOMBRE','$destino','$PRECIO','$CANTIDAD',$GENERO)";
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