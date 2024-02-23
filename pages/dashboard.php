<?php
include("../services/authService.php");
include_once("../utils/utils.php");
authHandler("GET");

$utils = new Utils();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ryan Gomes" />
    <meta name="keywords" content="PHP, MySQL, HTML, SASS" />
    <title>Model Canvas - Dashboard</title>
    <!-- Link's -->
    <link rel="stylesheet" href="/dist/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="icon" href="../assets/img/site-logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <!-- Scripts -->
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
</head>

<body class="bg-gradient-to-b from-slate-300 to-slate-500 h-screen">
    <nav class="border-gray-200 bg-gradient-to-b from-slate-600 to-slate-800">
        <div class="flex flex-wrap items-center justify-between mx-auto pl-4 pt-2 pb-2 pr-4">
            <div class="flex flex-row items-center bg-transparent justify-between w-screen">
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center w-10 p-2 h-10 text-sm text-black rounded-lg md:hidden justify-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="md:hidden text-white text-sm">
                    <h1>PROJETO TESTE</h1>
                </div>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg max-md:bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-black md:text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-400 md:p-0 md:w-auto">
                            <div class="userinfo">
                                <div id="usericon">
                                    <img class="userimg" src="../assets/img/user-icon.png">
                                </div>
                                <div id="usertext">
                                    <p>Olá, <?php echo $_SESSION['username']; ?></p>
                                </div>
                            </div>
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="./exportPdf.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Exportar PDF</a>
                                </li>
                                <li>
                                    <a href="./projetos.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Voltar aos projetos</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="../api/auth.php?logout=true" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sair</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="hidden w-full md:block md:w-auto text-white text-sm">
                <h1>PROJETO TESTE</h1>
            </div>
        </div>
    </nav>

    <main>
        <div class="dashboardContainer">
            <div class="parent">
                <div class="card" onclick="goToForms(0)">
                    <div id="cardTitle">Recurso Chave</div>
                    <div id="cardSubtitle">
                        São as empresas ou organizações que ajudam a empresa a criar valor para o cliente.
                    </div>
                </div>

                <div class="card_green" onclick="goToForms(1)">
                    <div id="cardTitle" class="mt">Proposta de Valor</div>
                    <div id="cardSubtitle" class="mb">
                        É o valor que o produto/serviço oferece para o cliente.
                    </div>
                </div>

                <div class="card_aquamarine" onclick="goToForms(2)">
                    <div id="cardTitle" class="mt">Segmento de Cliente</div>
                    <div id="cardSubtitle" class="mb">
                        São os grupos de clientes que a empresa pretende atender.
                    </div>
                </div>

                <div class="card_olive" onclick="goToForms(3)">
                    <div id="cardTitle">Parceiros Chave</div>
                    <div id="cardSubtitle">
                        São as empresas ou organizações que ajudam a empresa a criar valor para o cliente.
                    </div>
                </div>

                <div class="card_yellow" onclick="goToForms(4)">
                    <div id="cardTitle">Problemas</div>
                    <div id="cardSubtitle">
                        São as necessidades ou desafios enfrentados pelo cliente que a empresa se propõe a solucionar.
                    </div>
                </div>

                <div class="card_red" onclick="goToForms(5)">
                    <div id="cardTitle">Solução</div>
                    <div id="cardSubtitle">
                        É o produto/serviço oferecido pela empresa para resolver os problemas do cliente.
                    </div>
                </div>

                <div class="card_emerald" onclick="goToForms(6)">
                    <div id="cardTitle" class="mt">Relacionamento com cliente</div>
                    <div id="cardSubtitle" class="mb">
                        É a forma como a empresa se relaciona com o cliente.
                    </div>
                </div>

                <div class="card_rose" onclick="goToForms(7)">
                    <div id="cardTitle" class="mt">Atividades Chaves</div>
                    <div id="cardSubtitle" class="mb">
                        São as atividades essenciais para a operação do negócio.
                    </div>
                </div>

                <div class="card_orange" onclick="goToForms(8)">
                    <div id="cardTitle">Métricas Chave</div>
                    <div id="cardSubtitle">
                        São as métricas utilizadas para mensurar o desempenho do negócio.
                    </div>
                </div>

                <div class="card_jade" onclick="goToForms(9)">
                    <div id="cardTitle">Canais de distribuição</div>
                    <div id="cardSubtitle">
                        São os canais pelos quais a empresa se comunica e entrega seu produto/serviço ao cliente.
                    </div>
                </div>

                <div class="card_lightblue" onclick="goToForms(10)">
                    <div id="cardTitle" class="mt">Estrutura de custo</div>
                    <div id="cardSubtitle" class="mb">
                        São os custos envolvidos na operação do negócio.
                    </div>
                </div>

                <div class="card_lawngreen" onclick="goToForms(11)">
                    <div id="cardTitle" class="mt">Vantagem competitiva</div>
                    <div id="cardSubtitle" class="mb">
                        É o que diferencia o negócio dos seus concorrentes.
                    </div>
                </div>

            </div> <!--- Div Grid --->
            <div class="cardBottom" onclick="goToForms(12)">
                <div class="card_gray">
                    <div id="cardTitle" class="mt">Fonte de receita</div>
                    <div id="cardSubtitle" class="mb">
                        É como a empresa ganha dinheiro.
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
</body>
<script>
    function goToForms(step) {
        window.location = "./formulario.php?step=" + step;
    }
</script>

</html>