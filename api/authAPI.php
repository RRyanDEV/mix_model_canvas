<?php

include("../controllers/authController.php");


if (isset($_REQUEST['logout']) == "true") {
  session_start();
  session_destroy();
  header('Location: ../pages/login.php', true, 301);
  exit();
}

function authHandler($method)
{
  switch ($method) {
    case "POST":
      if (isset($_POST['email'])) {
        authLogin();
      }
      break;
    case "GET":
      authCheckLogin();
      break;
    case "REQUEST":
      if (isset($_REQUEST['username'])) {
        authCreateUser();
      }
      break;
    default:
      header('Location: ./pages/errors/405.php', true, 301);
      exit();
  }
}

?>

<!-- . -->