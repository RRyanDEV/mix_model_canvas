<?php

include("../controllers/exportController.php");

function pdfHandler($method, $args)
{
    switch ($method) {
        case "POST":
          if (isset($_POST['submit'])) {
          }
          break;
          case "GET":
           getPDF($args);
           break;
        default:
          header('Location: ./pages/errors/405.php', true, 301);
          exit();
      }
}

?>

<!-- . -->