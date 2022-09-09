<?php
function conectar(){
    $conexion = null;
    $host = 'localhost';
    $db = 'sat';
    $user = 'root';
    $pwd = '12345';
    
    try{
        $conexion = new PDO('sysgl:host='.$host .';dbname='.$db, $user, $pwd);
    }
    catch (PDOException $e){
        echo '<p>No se puede conectar a la base de datos</p>'
        exit;
    }
    return $conexion;
}

?>