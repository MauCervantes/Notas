<?php
    session_start();
    if(!isset($_SESSION['usr'])){
        header("Location: login.php");
    }else{        
        $usr_sesion = $_SESSION['usr']['nombre'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>  <!--Llamada a boostrap-->
    <title>Lista de Notas</title>
    
    <!-- font-awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/notas.css">
</head>

<body>
    <!-- header section starts -->
    <header class="header fixed-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <a href="menu.php" class="logo"> <img src="../assets/ofin.png"></a>
    
                <nav class="nav">
                    <a href="../../controller/cerrarsesion.php">Cerrar Sesion</a>
                </nav>
    
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
        </div>
    </header>
    <!-- header section ends -->

    
    <div class="container is-fluid">
        <div class="col-xs-12">
            <h1>Bienvenido <?php echo $_SESSION['usr']['nombre']; ?></h1>
            <br>
            <h1>Mis Notas</h1>
            <br>
            <button class = "btn btn-light" name = "enviar" id = "crear">Crear Nota</button>
            <br>
            <br>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
    <?php
        $conn = new PDO("mysql:host=localhost;dbname=notas", "mau", "19240369");              
        $SQL = "select id_notas, descripcion, fecha, estatus from notas where id_usuario = " . $_SESSION['usr']['id'];
        
        $dato = $conn->prepare($SQL);
        $dato->setFetchMode(PDO::FETCH_ASSOC);
        $dato->execute();

        if(isset($dato)){
            while($row = $dato->fetch()){
        ?>
                    <tr>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['estatus']; ?></td>
                        <?php
                            if($row['estatus'] == "pendiente"){
                        ?>
                            <td>
                                <a class="btn btn-success" href="../../controller/aceptarNota.php?id=<?php echo $row['id_notas']?> ">
                                Terminar</a>
                                <a class="btn btn-danger"  href="../../controller/cancelarNota.php?id=<?php echo $row['id_notas']?> ">
                                Cancelar</a>
                            </td>
                        <?php
                            }
                        ?>
                    </tr>
    <?php
            }
        }else{
    ?>
                    <tr class="text-center">
                        <td colspan="16">No existen registros</td>
                    </tr>
    <?php
            }
    ?>
                
            </table>
            <!-- custom js file link  -->
            <script defer src="../js/crear.js"></script>
</body>
</html>
