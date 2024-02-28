<?php

function formUpdate($args){
        $userid = $_SESSION['userID'];
        $pergunta = $args[0];
        $formName = $args[1]['submit'];
        $respostaForm = $args[1][$formName];
        $projetoid = $_SESSION['dashboardProjeto']['projetoID'];


        $postForm = array(
            $respostaForm,
            $userid,
            $pergunta,
            $projetoid,
        );

        if(strlen($_SESSION['dashboardProjeto'][$pergunta]) > 0){
            performQuery("update", [$postForm[0],$postForm[3],$postForm[1],$postForm[2]]);
        } else {
            performQuery("insert", [$postForm[3],$postForm[1],$postForm[2],$postForm[0]]);
        }
        header("Location: ./dashboard.php?projeto=" . $projetoid);
        exit();
}


?>

<!-- . -->