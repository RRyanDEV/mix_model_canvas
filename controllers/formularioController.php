<?php

function formUpdate($args){
        $userid = $_SESSION['userID'];
        // $step = $_SESSION['step'];
        // $pergunta = $GLOBALS['componentArray'][(int)$step]['title'];
        // print_r($args);
        $pergunta = $args[0];
        $formName = $args[1]['submit'];
        $respostaForm = $args[1][$formName];
        echo $respostaForm, $formName, $pergunta;
        /*
        $postForm = array(
            'userID' => $_SESSION['userID'],
            'pergunta' => $title,
            'resposta' => $args['post']['submit'],
            'post' => $_POST,
        
        );
        */

        // $respostaForm =  $_POST[$GLOBALS['componentArray'][(int)$step]['name']];
        // if (strlen($_SESSION[$pergunta]) > 0) {
        //     performQuery("update", [$respostaForm, $userid, $pergunta]);
        // } else {
        //     performQuery("insert", [$userid, $pergunta, $respostaForm]);
        // }
        // $_SESSION[$args[0][(int)$_SESSION['step']]['title']] = $respostaForm;
        // header("Location: ./dashboard.php");
        // exit();
}
?>

<!-- . -->