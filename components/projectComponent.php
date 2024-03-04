<?php
include_once("../services/database/performQuery.php");

function projectComponent($projetos)
{
    if (is_null($_SESSION['projetos'])) {
        return ('<div class="flex flex-col h-full text-gray-400 font-light items-center justify-center">
    <h1>Sem projetos listados.</h1>
    </div>');
    } else {
        $component = '<fieldset id="checkArray">';
        foreach ($projetos as $key => $projeto) {
            $component = $component . '<div id="' . $key . '"><label for="projeto-' . $key . '"><input id="projeto-' . $key . '" type="checkbox" value="on" name="' . $projeto[0] . '" class="w-4 h-4 mb-1 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"><a class="text-lg pl-1 font-medium text-white" href="./dashboard.php?projeto= ' . $projeto[0] . '">' . $projeto[2] . '</a><p class="mb-4 text-gray-400 flex items-center text-sm">' . $projeto[3] . '</p></label></div>';
        }
        return $component . '</fieldset>';
    }
}

?>


<!-- . -->