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

<body class="flex items-center h-screen w-screen  flex-col bg-gradient-to-b from-slate-300 to-slate-500">
    <nav>
        <div class="flex w-screen p-2 bg-gradient-to-r from-slate-600 to-slate-800 justify-between">

            <div class="ml-3 flex space-x-2 items-center" id="userInfo">
                <img class="w-8 h-8" src="../assets/img/user-icon.png">
                <p class="text-white">Olá, USER</p>
            </div>

            <div class="flex flex-row text-white space-x-3 mr-5 items-center">
                <a id="logOut-btn" href="../api/auth.php?logout=true"><button type="button" class="p-2 border rounded-md bg-gray-900 hover:bg-gray-500/50">
                        Sair</button></a>
            </div>
        </div>
    </nav>

    <div class="flex flex-col max-sm:mt-14 mt-28 p-4 h-auto max-sm:w-auto w-1/2 rounded-xl bg-gradient-to-b from-slate-600 to-slate-800 space-y-12">


        <div class="flex flex-col space-y-8">

            <div class="flex justify-center">
                <div class="pt-2 flex items-center justify-center flex-col">
                    <h1 class="font-medium text-2xl text-white">Lista de projetos</h1>
                    <p class="text-gray-400">Clique no nome do projeto para editar.</p>
                </div>
            </div>


            <div id="listProj" class="mx-20 overflow-y-auto h-48">
                <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-white"><a href="./dashboard.php">PROJETO TESTE</a></label>
                </div>
            </div>


            <div id="buttons">
                <div id="gridBtn" class="flex flex-row space-x-5 justify-center max-sm:flex-col max-sm:items-center max-sm:space-y-5 mb-3">

                    <a href="./novoProjeto.php">
                        <button type="button" class="w-30 text-white bg-green-700 hover:bg-green-700/50 font-medium rounded-lg text-sm p-3 text-center justify-center items-center">
                            Criar Projeto
                        </button>
                    </a>

                    <a href="">
                        <button type="button" class="w-30 text-white bg-red-700 hover:bg-red-700/50 font-medium rounded-lg text-sm p-3 text-center justify-center items-center">
                            Deletar Projeto
                        </button>
                    </a>

                </div>
            </div>

        </div>

    </div>

</body>

</html>