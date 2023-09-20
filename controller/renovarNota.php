<?php
    include("../persistence/NotasDAO.php");
    session_start();

    $id = $_GET['id'];

    $nota  = new NotasDAO();
    $m = "pendiente";

    $result = $nota->anNota($id, $m);
    $siguiente = "../view/html/menu.php";
    header("Location: {$siguiente}");
?>
