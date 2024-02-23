<?php

function formUpdate($args){
        $userid = $_SESSION['userID'];
        $step = $_SESSION['step'];
        $pergunta = $GLOBALS['componentArray'][(int)$step]['title'];
        $respostaForm =  $_POST[$GLOBALS['componentArray'][(int)$step]['name']];
        if (strlen($_SESSION[$pergunta]) > 0) {
            performQuery("update", [$respostaForm, $userid, $pergunta]);
        } else {
            performQuery("insert", [$userid, $pergunta, $respostaForm]);
        }
        $_SESSION[$args[0][(int)$_SESSION['step']]['title']] = $respostaForm;
        header("Location: ./dashboard.php");
        exit();
}
?>

<!-- . -->