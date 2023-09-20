<?php
    session_start();
    include("../persistence/UsuarioDAO.php");
    include("../model/Usuario.php");
    $_SESSION['usr']['men'] = "correcto";

    //recuperar datos del forms SignUp.php
    $usuario = $_POST["in-user-name"];
    $contra = $_POST["in-pass"];
    $nombre = $_POST["in-nombre"];


    //valide que el registro no exista
    //Construimos objeto DAO
    $usuarioDAO = new UsuarioDAO();
    $usuarioO = $usuarioDAO->buscarNombre($usuario);

    if($usuarioO->getID() == null){
        //Realizamos la consulta insert
        $result = $usuarioDAO->registraUsu($usuario, $contra, $nombre);

        if($result){
            echo "<script>javascript:alert('Registro completado');</script>";
            $siguiente = '../index.html';
        }else{
            echo "<script>javascript:alert('Registro incorrecto');</script>";
            $siguiente="../view/html/singUp.html";
        }
    }else{
        echo "<script>javascript:alert('Error al realizar el registro');</script>";
        $siguiente="../view/html/singUp.html";
    }
    header("Location: {$siguiente}");
?>