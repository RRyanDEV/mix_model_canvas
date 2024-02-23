<?php 


function ProjectComponent($nomeProj){
    return('<div class="flex items-center mb-4">
    <input id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="default-checkbox" class="ms-2 text-sm font-medium text-white"><a href="./dashboard.php">' . $nomeProj . '</a></label>
</div>');
}

?>

<!-- <div class="flex flex-col h-full text-gray-400 font-light items-center justify-center">
                <h1>Sem projetos listados.</h1>
            </div> -->
<!-- . -->