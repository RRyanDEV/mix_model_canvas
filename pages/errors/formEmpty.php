<?php
session_start();

$projetoID = '';
if(isset($_SESSION['dashboardProjeto'])){
    $projetoID = $_SESSION['dashboardProjeto']['projetoID'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Property -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ryan Gomes" />
    <meta name="keywords" content="PHP, MySQL, HTML, SASS" />
    <!-- Link's -->
    <link rel="stylesheet" href="../../assets/scss/main.css">
    <link rel="icon" href="../assets/img/site-logo.png" />
    <title>Erro de Login</title>
</head>

<body>
    <div class='containerLogin'>
        <div class='login'>
            <h1>Falha ao exportar PDF, preencha todas as avaliações e tente novamente.</h1>
            <br>
            <p class='link'>Clique aqui para<a href="<?php  if(strcmp($projetoID, '') !== 0){
               echo("../dashboard.php?projeto=" . $projetoID);
            } else{
                echo("../projetos.php");
            }?>"> voltar</a></p>
        </div>
    </div>
</body>


</html>