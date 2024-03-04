<?php
include("../services/authService.php");
include_once("../utils/utils.php");
include_once("../components/layouts/defaultLayout.php");
include_once("../components/pdfComponent.php");
include_once("../api/exportPdfAPI.php");

authHandler("GET");
$doc = new DOMDocument();
$doc->loadHTML(defaultLayout() . '<title>Exportação - Model Canvas</title>');
echo $doc->saveHTML();

if (isset($_GET)) {
    if (isset($_GET['projectID'])) {
        $projectID = $_GET['projectID'];
        pdfHandler("GET", [$projectID]);
    }
}

$username = $_SESSION['exportPDF']['username'];
$email = $_SESSION['exportPDF']['email'];
$dateExport = $_SESSION['exportPDF']['date'];

$returnToDashboard = false;
if (isset($_SESSION['exportPDF']['returnToDashboard'])) {
    $returnToDashboard = true;
}

$projetoID = '';
if(isset($_SESSION['dashboardProjeto'])){
    $projetoID = $_SESSION['dashboardProjeto']['projetoID'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/style.css">
    <title></title>
    <script src="../../src/libs/flowbite/flowbite.min.js"></script>
</head>

<body>
    <div class="bg-white flex justify-between items-center rounded-xl mx-9 my-3">
        <div class="flex flex-col">
            <h1 class="text-lg flex pl-5 pt-2 flex-row text-gray-700">
                Nome:<p class="ml-1 text-gray-800"><?php echo $username ?></p>
            </h1>
            <h1 class="text-lg pl-5 text-gray-700 flex flex-row">
                Email:<p class="ml-1 text-gray-800"><?php echo $email ?></p>
            </h1>
            <h1 class="text-lg pl-5 pb-2 flex flex-row text-gray-700">
                Data:<p class="ml-1 text-gray-800"><?php echo $dateExport ?></p>
            </h1>
        </div>

        <div class="flex m-4">
            <button type="button" id="imprimirBtn" class="text-white print:hidden bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Imprimir</button>

            <a href='<?php 
            if($returnToDashboard){
               echo("../../pages/dashboard.php?projeto=" . $projetoID);
            } else{
                echo("./projetos.php");
            }
            ?>'>
                <button type="button" class="py-2.5 print:hidden px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Voltar</button>
            </a>
        </div>
    </div>

    <?php
    $doc = new DOMDocument();
    $doc->loadHTML(defaultLayout() . createPdfComponent($_SESSION['exportPDF']));
    echo $doc->saveHTML();
    ?>
</body>

</html>

<script>
    const imprimirBtn = document.getElementById('imprimirBtn');
    imprimirBtn.addEventListener('click', function() {
        window.print();
    });
</script>