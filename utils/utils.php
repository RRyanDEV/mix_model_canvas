<?php

class Utils
{
    public function initialize($variable, $params)
    {
        if (isset($_GET['step'])) {
            $_SESSION['step'] = $_GET['step'];
        }
        if (!isset($_SESSION['textValue'])) {
            $_SESSION['textValue'] = "";
        }
        if (!isset($_SESSION['step'])) {
            $_SESSION['step'] = 0;
        }
        if (!isset($_GET['step'])) {
            $_SESSION['step'] = 0;
        }
        switch ($variable) {
            case "componentArray":
                if (!isset($_SESSION[$params[$_SESSION['step']]['title']])) {
                    $_SESSION[$params[$_SESSION['step']]['title']] = "";
                }
                break;
            case "newProjectData":
                if (!isset($_SESSION['newProjectData'])) {
                    $_SESSION['newProjectData'] = [];
                }
                break;
            default:
                break;
        }
    }

    public function valueIsIgnored($value, $valuesToIgnore)
    {
        $found = false;
        foreach ($valuesToIgnore as $item) {
            if (strcmp($value, $item) == 0) {
                $found = true;
            }
        }
        return $found;
    }
}

?>

<!-- . -->