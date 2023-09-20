<?php
    //Aqui genera la cita
    session_start();
    include("../persistence/NotasDAO.php");

    //recuperar datos del forms de citas
    $des = $_POST["id_des"];
    $anio = $_POST["dAño"];
    $mes = $_POST["dMes"];
    $dia = $_POST["dDia"];
    $i = 1;


    $nota = new NotasDAO();

    $result = $nota->registrarNota($_SESSION['usr']['id'], $des, $anio, $mes, $dia);
    if($result){
        $siguiente = "../view/html/menu.php"; //modificado 31/05/2023
        $_SESSION['usr']['men'] = "correcto";
    }else{
        $siguiente = "../view/html/notas.php";
        $_SESSION['usr']['men'] = "mal";
    }
    header("Location: {$siguiente}");
?>