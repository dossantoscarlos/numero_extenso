<?php
declare(strict_types=1);

namespace app;

use function app\auxiliar\{
    centena,
    dezena,
    d10,
    plural,
    singular,
    unidade
};

function convertForNumeric(string $valor):float
{
    if (!is_numeric($valor)) {
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
    }

    return floatval($valor);
}


function percorre_valor(array $inteiro, int $fim, int $moeda): string
{

    $rt = "";

    foreach ($inteiro as $i => $value) {
        $rc = (($value > 100) && ($value < 200)) ? "cento" : centena()[$value[0]];
        $rd = ($value[1] < 2) ? "" : dezena()[$value[1]];
        $ru = ($value > 0) ? (($value[1] == 1) ? d10()[$value[2]] : unidade()[$value[2]]) : "";

        $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
        $t = count($inteiro) - 1 - $i;


        if ($r && $moeda == 1) {
            $r .= " " . ($value > 1 ? plural()[$t] : singular()[$t]);
        }

        if ($r) {
            if (($i > 0) && ($i <= $fim) && ($inteiro[0] > 0)) {
                $rt .= ($i < $fim) ? ", " : " e ";
            }
            $rt .= $r;
        }
    }

    return $rt;
}


function inteiro(string $valor) : array
{

    $valorFloat = convertForNumeric($valor);

    $valorFloat = number_format($valorFloat, 2, ".", ".");
    $inteiro = explode(".", $valorFloat);

    foreach ($inteiro as $key => $value) {
        $inteiro[$key] = str_pad($value, 3, "0", STR_PAD_LEFT);
    }

    return $inteiro;
}

function valorPorExtenso(float|int|string $valor, string $moeda, $maiusculas = false) : string
{

    $inteiro = inteiro($valor);

    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
    
    $rt = percorre_valor($inteiro, $fim , intval($moeda));

    return $maiusculas ? strtoupper(trim($rt)) : trim($rt);
}
