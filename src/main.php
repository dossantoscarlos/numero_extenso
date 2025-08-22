<?php
declare(strict_types=1);

namespace app;

use function app\{valorPorExtenso};

function main ($argc, $argv) : void 
{
    if ($argc < 2) {
        echo "Uso: php {$argv[0]} \"53.042.635.304,45\" 1 -> para moeda \n";
        exit(1);
    }

    $valor = $argv[1];
    $moeda  = $argv[2] ?? "0";

    echo valorPorExtenso($valor, $moeda) . PHP_EOL;
}

