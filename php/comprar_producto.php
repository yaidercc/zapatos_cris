<?php
    include 'conexion.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idusu=$_POST['idusu'];
        $cantidad=$_POST['cantidad'];
        $idpro=$_POST['idp'];
        $precio=$_POST['precio'];
        $total=$cantidad*$precio;
    }
    $factura=rand(123344, 199995);
    $comprar=rand(123324, 188995);
    $query="INSERT INTO `encabezado_ventas`(`NRO_FACTURA`, `FECHA_COMPRA`, `ID_USUARIO_FK`) VALUES ($factura,CURRENT_TIMESTAMP,$idusu)";
    $ran=mysqli_query($conexion,$query);

    $consulta="INSERT INTO `detalle_compras`(`ID_COMPRA`, `CANTIDAD`, `TOTAL`, `TALLAS`, `ID_PRODUCTO_FK`, `NRO_FACTURA_FK`) VALUES ($comprar,$cantidad,$total,'31',$idpro,$factura)";
    $run=mysqli_query($conexion,$consulta);

    if(!$ran and !$run){
        echo " <script language='JavaScript'>
            alert('error');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/comprar.php?no=$ID');
        </script>";
    }else{
        echo " <script language='JavaScript'>
            alert('comprado con exito');
            location.replace('http://localhost/Proyecto%20ppi/Aplicativo/cliente.php');
        </script>";
    }

?>