<?php
include_once("../services/database/performQuery.php");

function getProjetos($userID)
{
    $projetoArr = performQuery("selectProject", [$userID]);
    return $projetoArr;
}

function postProjeto($args)
{
    performQuery("insertProject", $args);
}
function deleteProjeto($args)
{
    foreach ($args as $key => $arg) {
        if (is_numeric($key)) {
            performQuery("deleteProject", [$key]);
            header("Refresh:0");
        }
    }
}


?>
<!-- . -->