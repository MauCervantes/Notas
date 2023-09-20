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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Notas</title>

     <!-- font-awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

     <!-- bootstrap cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
 
</head>
<body>
    <!-- header section starts -->
    <header class="header fixed-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <a href="menu.php" class="logo"> <img src="../assets/ofin.png"></a>
    
                <nav class="nav">
                    <a href="menu.php">Principal</a>
                </nav>
    
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
        </div>
    </header>
    <!-- header section ends -->

    <!-- profile section starts -->
    <section class="profile">
        <div class="form-profile">
            <h3 class="heading"> <?php echo $usr_sesion ?> </h3>

            <div class="content">
                <form action="../../controller/crearNota.php" method = "POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Descripción</span>
                            <input type="text" required = "true" autocomplete="off" placeholder="Descripcion" id="id_des" name="id_des" class="class_des">
                        </div>

                        <div class="input-box">
                            <span class="details">Año</span>
                            <select name="dAño" id="dAño"> </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Mes</span>
                            <select name="dMes" id="dMes"></select>
                        </div>

                        <div class="input-box">
                            <span class="details">Día</span>
                            <select name="dDia" id="dDia"></select>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" name = "aceptar" id = "aceptar" value="Aceptar">
                    </div>
                    <div class="button">
                        <input name = "cancelar" id = "cancelar" value="Cancelar">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- profile section ends -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/form.css">

    <!-- custom js file link  -->
    <script src="../js/cbox.js"></script>
    
</body>
</html>
