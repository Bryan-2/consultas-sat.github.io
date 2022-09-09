<!DOCTYPE html>
<html lang="en">
<head>
    <title>Consulta de CUI / NIT SAT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/estilosat.css">
</head>
<img src="./img/Logo_SAT_Guatemala.svg.png" alt="">
<h2>Consultas de CUI / NIT SAT</h2>
<header>
    <div class ="menu">
        <nav>
            <ul>
                <li><a href="https://portal.sat.god.gt/portal/#servicios">servicios tributarios</a></li>
                <li><a href="https://portal.sat.god.gt/portal/consultas-aduanas/">aduanas</a></li>
                <li><a href="https://portal.sat.god.gt/portal/capacitaciones/capacitacion-virtual/">capacitaciones</a></li>
                <li><a href="https://portal.sat.god.gt/portal/contactos/informacion-y-consultas/">contáctanos</a></li>
                <li><a href="">CUI/NIT</a></li>
            </ul>
        </nav>
    </div>
<body>
    


<div class = "container">
    <form role="form" method="POST">
        <div class="form-group">
            <label for="email">Identificacion Personal NIT:</label>
            <input type="text" class="form-contrl" name="documento" placeholder="Ingrese NIT" required>
        </div>
        <button type="submit" class="btn btn-defult">Consultas</button><br>

    </form>
    <a href="./cui.php"><button>consultas por CUI</button></a>
    <br>

<?php

if($_POST){
    require('conexiones.php');
    $con = conectar();
    $id = $_POST['documento'];
    $SQL = 'SELECT NIT, Nombre_Apellidos, Fecha_Nacimientos, Nit_Generado, Fecha_Creacion_NIT FROM datos WHERE CUI = :doc';
    $stmt =$con->prepare($SQL);
    $result = &stmt->execute(array(':doc'=>$id));
    $rows = $stmt->fetchALL(\POO::FETCH_OBJ);

    if(count($rows)){

        foreach($rows AS $row){

            ?>
        <div class="panel panel-primary">
        <div class="panel-heading">Informacion de Busqueda sistema SAT con NIT:<br><?php print($id) ?> </div>
        <div class="panel-body">
            <?php print("CUI: ".$row->CUI."<br>")?>
            <?php print("Nombre y Apellidos: ".$row->Nombre_Apellidos."<br>")?>
            <?php print("Fecha de Nacimiento: ".$row->Fecha_Nacimiento."<br>")?>
            <?php print("Nit Generado: ".$row->Nit_Generado."<br>")?>
            <?php print("Fecha de Creacion NIT: ".$row->Fecha_Creacion_NIT."<br>")?>

        </div>
        </div>
        </div>
             <?php

        }

    
    }else{
        include("./exit.php");
        
    }

}
?>
</div>
</body>
</html>