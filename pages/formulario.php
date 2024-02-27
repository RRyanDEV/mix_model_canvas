<?php
include("../utils/utils.php");
include("../api/form.php");
include("../api/auth.php");
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

// print_r($_POST);



$title = $componentArray[$_SESSION['step']]['title'];
$value = $_SESSION['dashboardProjeto'][$title];
$postForm = array(
    $title,
    $_POST

);
formHandler('POST', $postForm);
// print_r($componentArray[$_SESSION['step']]['title']);











// $_SESSION['textValue'] = $_SESSION[$componentArray[$_SESSION['step']]['title']];



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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <title>Questionário</title>
</head>

<body>
    <script type="text/javascript">
        function goToDash() {
            window.location = "./dashboard.php"
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