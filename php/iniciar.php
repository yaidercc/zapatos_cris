<?php
    include 'conexion.php';
    session_start();
    $iduser = $_POST['iduser'];
    $contra = $_POST['clave'];
    $consulta="SELECT ID_USUARIO,CLAVE FROM usuarios where ID_USUARIO='$iduser' AND CLAVE='$contra'";
    $resultado=mysqli_query($conexion,$consulta);
    if(!isset($resultado)){
        echo "no se encontro el usuario";
    }else{
        echo "se encontro el usuario";
    }
?>