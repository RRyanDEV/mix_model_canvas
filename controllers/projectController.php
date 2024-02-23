<?php 
include("../services/database/performQuery.php");

function getProjetos($userID){
    $projetoArr = performQuery("selectProject" , [$userID]);
    return $projetoArr;
}

function postProjeto($args){
    performQuery("insertProject" , [$args]);
    
}

?>
<!-- . -->