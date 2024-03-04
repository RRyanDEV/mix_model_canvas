<?php

include("../controllers/formularioController.php");

function formHandler($method, $args)
{
  switch ($method) {
    case "POST":
      if (isset($_POST['submit'])) {
        if (!isset($_SESSION['username'])) {
          header('Location: ./pages/login.php', true, 301);
          exit();
        } else {
          updateForm($args);
        }
      }
      break;
    default:
      header('Location: ./pages/errors/405.php', true, 301);
      exit();
  }
}

?>

<!-- . -->