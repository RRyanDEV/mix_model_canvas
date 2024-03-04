<?php
function createPdfComponent($exportData)
{
    $table = '';
    foreach ($exportData as $key => $item) {
        $component = '';
        $heading = '<div class="relative break-after-page overflow-x-auto sm:rounded-lg my-9 mx-9">
        <table class="w-full text-sm text-left rtl:text-right rounded-xl text-gray-500">';
        if (is_numeric($key)) {
            $heading = $heading . '<caption class="p-5 text-lg font-semibold text-left rtl:text-right print:border-r print:border-l print:border-t text-gray-900 bg-white">' . $exportData[$key]['projetoNome'] . '<p class="mt-1 text-sm font-normal text-gray-500">' . $exportData[$key]['projetoDesc'] . '</p>
                </caption>
                <thead class="text-xs text-gray-800 print:border-b print:border-r print:border-l print:border-t uppercase bg-gray-200"><tr><th scope="col" class="px-6 py-3">Avaliação</th><th scope="col" class="px-6 py-3">Resposta</th></tr></thead>';
            foreach ($exportData[$key] as $pergunta => $resposta) {
                if (strcmp($pergunta, 'projetoNome') !== 0 && strcmp($pergunta, 'projetoDesc') !== 0) {
                    $component = $component . '<tbody><tr class="bg-white border-b print:border-r print:border-l mb-9"><th scope="row" class="px-6 py-4 font-medium print:border-r text-gray-900 whitespace-nowrap">' . $pergunta . '</th><td class="px-6 py-4 h-auto pb-6 w-1/2">' . $resposta . '</td></tr></tbody>';
                }
            }
            $component = $component . '</table></div>';
            $table = $table . $heading . $component;
        }
    };
    return $table;
}
?>

<!-- . -->