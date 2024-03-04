<?php
include("../utils/utils.php");
include("../api/formAPI.php");
include("../api/authAPI.php");
include("../components/formComponent.php");
include("../services/database/performQuery.php");
include_once("../components/layouts/defaultLayout.php");
session_start();

authHandler('GET');

$utils = new Utils();
$utils->initialize('componentArray', $componentArray);
$doc = new DOMDocument();
$doc->loadHTML(defaultLayout());
echo $doc->saveHTML();


$title = $componentArray[$_SESSION['step']]['title'];
$value = $_SESSION['dashboardProjeto'][$title];
$postForm = array(
    $title,
    $_POST

);
$projetoID = $_SESSION['dashboardProjeto']['projetoID'];

formHandler('POST', $postForm);

function createComponent($arrayIndex)
{
    $componentProps = array_values($GLOBALS['componentArray'][$arrayIndex]);
    return formComponent(...$componentProps);
}

$doc->loadHTML(defaultLayout() . createComponent($_SESSION['step']));

$element = $doc->getElementById("txt");
if ($element !== null) {
    $element->textContent = $value;
}

echo $doc->saveHTML();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="PHP, MySQL, HTML, SASS" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../src/libs/jquery/jquery.min.js"></script>
    <title>Questionário</title>
</head>

<body>
    <script type="text/javascript">
        function goToDash() {
            window.location = "./dashboard.php?projeto=<?php $projetoID ?>"
        }

        jQuery(document).on('keyup', 'textarea', updateCount);
        jQuery(document).on('keydown', 'textarea', updateCount);

        function updateCount() {
            let cs = jQuery(this).val().length;
            const max = `restam ${1000 - cs} caracteres`;
            jQuery('#letter_count').text(max);
        }
    </script>
    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
</body>

</html>