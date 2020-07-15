<?php
    include 'conexion.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idusu=$_POST['idusu'];
        $cantidad=$_POST['cantidad'];
        $idpro=$_POST['idp'];
        $precio=$_POST['precio'];
        $talla=$_POST['talla'];
        $total=$cantidad*$precio;
    }
    $verificar="SELECT CANTIDAD FROM productos WHERE ID_PRODUCTO=$idpro";
    $correr=mysqli_query($conexion,$verificar);
    $cant=mysqli_fetch_array($correr);
    if($cant['CANTIDAD']>=$cantidad && isset($talla)){
        $factura=rand(123344, 199995);
        $comprar=rand(123324, 188995);
        $query="INSERT INTO `encabezado_ventas`(`NRO_FACTURA`, `FECHA_COMPRA`, `ID_USUARIO_FK`) VALUES ($factura,CURRENT_TIMESTAMP,$idusu)";
        $ran=mysqli_query($conexion,$query);
    
        $consulta="INSERT INTO `detalle_compras`(`ID_COMPRA`, `CANTIDAD`, `TOTAL`, `TALLAS`, `ID_PRODUCTO_FK`, `NRO_FACTURA_FK`) VALUES ($comprar,$cantidad,$total,$talla,$idpro,$factura)";
        $run=mysqli_query($conexion,$consulta);
    
        $decre="UPDATE productos SET CANTIDAD=CANTIDAD-$cantidad WHERE ID_PRODUCTO=$idpro";
        $dec=mysqli_query($conexion,$decre);
        if(!$ran and !$run and !$dec){
            echo " <script language='JavaScript'>
                alert('error');
                location.replace('http://localhost/Proyecto%20ppi/Aplicativo/comprar.php?no=$idpro');
            </script>";
        }else{
            echo " <script language='JavaScript'>
                alert('comprado con exito');
                location.replace('http://localhost/Proyecto%20ppi/Aplicativo/cliente.php');
            </script>";
        }
    }else{
        echo " <script language='JavaScript'>
                alert('solo disponemos de '+$cant[CANTIDAD]+' unidades');
                location.replace('http://localhost/Proyecto%20ppi/Aplicativo/cliente.php');
            </script>";
    }
   

?>