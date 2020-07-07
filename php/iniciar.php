<?php
    include 'conexion.php';
    session_start();
    $iduser = $_POST['iduser'];
    $contra = $_POST['clave'];
    $consulta="SELECT * FROM usuarios where ID_USUARIO='$iduser' AND CLAVE='$contra'";
    $resultado=mysqli_query($conexion,$consulta);
    if(!isset($resultado)){
        echo " <script language='JavaScript'>
        alert('datos incorrectos');
        </script>";
    }else{
        $datos=$resultado->fetch_assoc();
        $_SESSION['data']=$datos;
        if($_SESSION['data']['ID_TIPO_USUARIO_FK']==1){
            header("location:../administrador.php");
        }else if($_SESSION['data']['ID_TIPO_USUARIO_FK']>1){
            header("location:../cliente.php");

        }else{
            echo " <script language='JavaScript'>
            alert('datos incorrectos');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/index.php#');
        </script>";
        }
        
}
   
?>