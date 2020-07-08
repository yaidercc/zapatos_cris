<?php
    function getConn(){
        $mysqli= mysqli_connect('localhost', 'root','','zapatos_cris');
        if(mysqli_connect_errno($mysqli))
            echo "fallo al conectar a mysql" . mysqli_connect_error();
        $mysqli->set_charset('utf8');
        return $mysqli;
        }

?>