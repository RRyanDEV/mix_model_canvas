<?php

include("../controllers/blocoController.php");

function dashboardHandler($method, $args)
{
  switch ($method) {
    case "POST":
      if (isset($_POST['submit'])) {
      
      }
      break;
      case "GET":
       getBlocos($args);
       break;
    default:
      header('Location: ./pages/errors/405.php', true, 301);
      exit();
  }
}

?>

<!-- . -->