<?php
    session_start();
    include("../persistence/UsuarioDAO.php");
    include("../model/Usuario.php");

    //recuperar datos del forms
    $alias = $_POST["usuarioI"];
    $contra = $_POST["in-pass"];


    //Objeto DAO
    $usuarioDAO = new UsuarioDAO();

    //Método buscar con alias y contraseña
    $usuario = $usuarioDAO->buscar($alias, $contra);

    //validación
    if($usuario != null){
        $siguiente = '../view/html/menu.php'; //PacientePrincipal
        $_SESSION['usr']['id'] = $usuario->getId();
        $_SESSION['usr']['usu'] = $usuario->getAlias();
        $_SESSION['usr']['contra'] = $usuario->getContrasena();
        $_SESSION['usr']['nombre'] = $usuario->getNombre();
    }else{
        $siguiente = "../index.html"; //PaginaLogin
    }

    //requiere_once();
    header("Location: {$siguiente}");
?>
