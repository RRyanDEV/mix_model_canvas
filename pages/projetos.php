<?php
include("../services/authService.php");
include_once("../utils/utils.php");
include("../components/projectComponent.php");
include("../api/projetosAPI.php");
authHandler("GET");

$utils = new Utils();
$utils->initialize('newProjectData', null);
$doc = new DOMDocument();

unset($_SESSION['dashboardProjeto']);

projectHandler("GET", [$_SESSION['userID']]);

switch (true) {
    case isset($_POST['submit']):
        $_SESSION['newProjectData'] = array(
            $_POST['projName'],
            $_POST['projDesc']
        );
        projectHandler("POST", $_SESSION['newProjectData']);
        break;
    case isset($_POST['submitDel']) || isset($_POST['submitExport']):
        if (count($_POST) > 1) {
            projectHandler("POST", $_POST);
        }
        break;
    default:
        break;
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
    <script src="../src/libs/flowbite/flowbite.min.js"></script>
    <script src="../src/libs/jquery/jquery.min.js"></script>
</head>

<body class="flex flex-col justify-around items-center h-screen w-screen bg-gradient-to-b from-slate-300 to-slate-500">
    <nav class="absolute top-0">
        <div class="flex w-screen p-2 bg-gradient-to-r from-slate-600 to-slate-800 justify-between">

            <div class="ml-3 flex space-x-2 items-center" id="userInfo">
                <img class="w-8 h-8" src="../assets/img/user-icon.png">
                <p class="text-white">Olá, <?php echo $_SESSION['username']; ?></p>
            </div>

            <div class="flex flex-row text-white space-x-3 mr-5 items-center">
                <a id="logOut-btn" href="../api/authAPI.php?logout=true"><button type="button" class="p-2 border w-28 rounded-md bg-gray-900 hover:bg-gray-500/50">
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

                    <button type="submit" name="submitExport" id="btnExportar" class="w-auto text-white bg-blue-700 hover:bg-blue-700/30 font-medium rounded-lg text-sm p-3" disabled>Exportar selecionados</button>
                </div>

                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" id="btnExcluir" class="w-auto text-white bg-red-700 hover:bg-red-700/50 font-medium rounded-lg text-sm p-3" type="button" disabled>
                    Excluir Selecionados
                </button>
                <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Deletar Projetos</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Deseja realmente deletar todos os projetos selecionados?</h3>
                                <button data-modal-hide="popup-modal" type="submit" name="submitDel" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Sim, eu desejo!</button>

                                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Não, cancelar!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    $('#checkArray').change(function() {
        $('#btnExcluir').prop('disabled', (i, v) => !v)
        $('#btnExportar').prop('disabled', (i, v) => !v)
    })
</script>

</html>