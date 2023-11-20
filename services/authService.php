<?php

include_once("../api/auth.php");
include_once("../services/database/performQuery.php");


session_start();

authHandler("POST");

function checkCredentials($hashed, $email, $password)
{
    $verifiedPassword = $hashed ? md5($password) : $password;
    $queryResult = performQuery('', [$email, $verifiedPassword]);
    if ($queryResult[0] == 1) {
        $_SESSION['userID'] = ($queryResult[1])[0];
        getUserData($_SESSION['userID']);
        return $queryResult[1][1];
    }
    return false;
}

function getUserData($userID)
{
    $fetch = performQuery('select', [$userID]);
    foreach ($fetch as $row) {
        $_SESSION[$row[2]] = $row[3];
    }
}


function logout()
{
    if (isset($_SESSION['username'])) {
        session_start();
        session_destroy();
        header("Location: ../index.php");
    }
}
