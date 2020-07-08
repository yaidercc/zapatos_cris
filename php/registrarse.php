<?php
    include 'conexion.php';
    $iduser = $_POST['iduser'];
    $identificacion= $_POST['identificacion'];
    $name1=$_POST['nombre1'];
    $name2=$_POST['nombre2'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $tel=$_POST['telefono'];
    $correo=$_POST['correo'];
    $contra = $_POST['clave'];
    $direccion=$_POST['direccion'];
    $gener=$_POST['genero'];
    $consulta="INSERT INTO `usuarios`(`ID_USUARIO`, `IDENTIFICACION`, `PRIMER_NOMBRE`, `SEGUNDO_NOMBRE`,`PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `CORREO`, `CLAVE`, `DIRECCION`, `TELEFONO`, `ID_TIPO_USUARIO_FK`, `ID_GENERO_FK`)
     VALUES ($iduser,'$identificacion','$name1','$name2','$apellido1','$apellido2','$correo','$contra','$direccion','$tel',2,$gener)";
    $resultado=mysqli_query($conexion,$consulta);
    if(!$resultado){
        echo " <script language='JavaScript'>
        alert('ocurrio un error al registrarse');
        </script>";
    }else{
        echo " <script language='JavaScript'>
        alert('registrado exitosamente dar click en el boton ingresar para iniciar sesion');
        location.replace('http://localhost/Proyecto%20ppi/Aplicativo/index.php#');
    </script>";
    }

   
?>