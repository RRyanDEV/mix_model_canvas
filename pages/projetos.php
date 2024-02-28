<?php
include("../services/authService.php");
include_once("../utils/utils.php");
include("../components/projectComponent.php");
include("../api/projetosAPI.php");
authHandler("GET");

$utils = new Utils();
$utils->initialize('newProjectData', null);
$doc = new DOMDocument();

projectHandler("GET", [$_SESSION['userID']]);

if (isset($_POST['submit'])) {
    $_SESSION['newProjectData'] = array(
        $_POST['projName'],
        $_POST['projDesc']
    );
    projectHandler("POST", $_SESSION['newProjectData']);
}
if (isset($_POST['submitDel'])) {
    projectHandler("POST", $_POST);
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ryan Gomes" />
    <meta name="keywords" content="PHP, MySQL, HTML, SASS, TAILWINDCSS" />
    <title>Model Canvas - Projetos</title>
    <!-- Link's -->
    <link rel="stylesheet" href="/dist/style.css">
    <link rel="icon" href="../assets/img/site-logo.png" />
</head>

<body class="flex flex-col justify-around items-center h-screen w-screen bg-gradient-to-b from-slate-300 to-slate-500">
    <nav class="absolute top-0">
        <div class="flex w-screen p-2 bg-gradient-to-r from-slate-600 to-slate-800 justify-between">

            <div class="ml-3 flex space-x-2 items-center" id="userInfo">
                <img class="w-8 h-8" src="../assets/img/user-icon.png">
                <p class="text-white">Olá, <?php echo $_SESSION['username']; ?></p>
            </div>

            <div class="flex flex-row text-white space-x-3 mr-5 items-center">
                <a id="logOut-btn" href="../api/auth.php?logout=true"><button type="button" class="p-2 border w-28 rounded-md bg-gray-900 hover:bg-gray-500/50">
                        Sair</button></a>
            </div>
        </div>
    </nav>

    <div class="flex flex-col p-4 max-sm:w-auto h-auto w-1/2 rounded-xl bg-gradient-to-b from-slate-600 to-slate-800 space-y-8">
        <div class="flex justify-center">
            <div class="p-2 flex items-center justify-center flex-col">
                <h1 class="font-medium text-2xl text-white">Lista de projetos</h1>
                <p class="text-gray-400">Clique no nome do projeto para editar</p>
            </div>
        </div>
        <form action="" class="flex flex-col space-y-8" method="POST">
            <div id="listProj" class="flex flex-col mx-20 overflow-y-auto h-48">
                <?php
                $doc->loadHTML('<?xml encoding="utf-8" ?>' . projectComponent($_SESSION['projetos']));
                echo $doc->saveHTML()
                ?>
            </div>
            <div class="flex flex-row justify-between max-sm:flex max-sm:flex-col max-sm:space-y-5 max-sm:items-center max-sm:mb-2">
                <div class="flex flex-row space-x-3">
                    <a href="./novoProjeto.php"><button type="button" class="w-auto text-white bg-green-700 hover:bg-green-700/50 font-medium rounded-lg text-sm p-3">Criar Projeto</button></a>

                    <a href=""><button type="button" class="w-auto text-white bg-blue-700 hover:bg-blue-700/30 font-medium rounded-lg text-sm p-3">Exportar selecionados</button></a>
                </div>

                <button type="submit" name="submitDel" class="w-auto text-white bg-red-700 hover:bg-red-700/50 font-medium rounded-lg text-sm p-3">Deletar Projeto</button>
            </div>
        </form>
    </div>
</body>

</html>