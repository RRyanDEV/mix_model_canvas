<?php
include("../services/authService.php");
include_once("../utils/utils.php");
authHandler("GET");

$utils = new Utils();
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

<body class="flex items-center h-screen w-screen flex-col bg-gradient-to-b from-slate-300 to-slate-500">
    <nav>
        <div class="flex w-screen p-2 bg-gradient-to-r from-slate-600 to-slate-800 justify-between">

            <div class="ml-3 flex space-x-2 items-center" id="userInfo">
                <img class="w-8 h-8" src="../assets/img/user-icon.png">
                <p class="text-white">Olá, <?php echo $_SESSION['username']; ?></p>
            </div>

            <div class="flex flex-row text-white space-x-3 mr-5 items-center">
                <a id="return-btn" href="../api/authAPI.php?logout=true"><button type="button" class="p-2 border w-28 rounded-md bg-gray-900 hover:bg-gray-500/50">
                        Sair</button></a>
            </div>
        </div>
    </nav>

    <div class="flex flex-col max-sm:mt-28 mt-28 p-4 h-auto max-sm:w-auto w-1/2 rounded-xl bg-gradient-to-b from-slate-600 to-slate-800 space-y-12">


        <div class="flex flex-col space-y-8">

            <div class="flex justify-center">
                <div class="pt-2 flex">
                    <h1 class="font-medium text-2xl text-white">Escreva o nome do projeto</h1>
                </div>
            </div>


            <form action="./projetos.php" method="POST">
                <div class="flex flex-col items-center space-y-6">
                    <div id="projCreate" class="flex flex-col space-y-4">
                        <div>
                            <label for="projName" class="block mb-2 text-sm font-medium text-white">Nome do Projeto</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5" placeholder="Digite o nome do Projeto" required name="projName" />
                        </div>

                        <div>
                            <div id="">
                                <label for="projDesc" class="block mb-2 text-sm font-medium text-white">Descrição do Projeto</label>
                                <textarea id="projDesc" name="projDesc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5" maxlength="500" cols="100" placeholder="Digite uma descrição do Projeto"></textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex mt-9 mb-3 justify-center space-x-9 items-center">

                    <button type="submit" name="submit" class="w-32 flex text-white bg-green-700 hover:bg-green-700/50 font-medium rounded-lg text-sm p-3 text-center justify-center items-center">Criar</button>

                    <a href="./projetos.php">
                        <button type="button" class="w-32 text-white bg-red-700 hover:bg-red-700/50 font-medium rounded-lg text-sm p-3 text-center justify-center items-center">
                            Voltar
                        </button>
                    </a>

                </div>

            </form>

</body>

</html>