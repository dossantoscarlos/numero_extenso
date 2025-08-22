<?php

declare(strict_types=1);

namespace app\auxiliar;


function singular () : array {
    return [
        "centavo",
        "real",
        "mil",
        "milhão",
        "bilhão",
        "trilhão",
        "quatrilhão"
    ];
}

function plural() : array {
    return [
        "centavos",
        "reais",
        "mil",
        "milhões",
        "bilhões",
        "trilhões",
        "quatrilhões"
    ];
}

function centena() : array {
    return [
        "",
        "cem",
        "duzentos",
        "trezentos",
        "quatrocentos",
        "quinhentos",
        "seiscentos",
        "setecentos",
        "oitocentos",
        "novecentos"
    ];
}

function dezena() : array {
    return [
        "",
        "dez",
        "vinte",
        "trinta",
        "quarenta",
        "cinquenta",
        "sessenta",
        "setenta",
        "oitenta",
        "noventa"
    ];
}


function unidade() : array {
    return [
        "", 
        "um", 
        "dois", 
        "três",
        "quatro",
        "cinco",
        "seis",
        "sete",
        "oito",
        "nove"
    ];
}


function d10() : array 
{
    return [
        "dez",
        "onze",
        "doze",
        "treze",
        "quatorze",
        "quinze",
        "dezesseis",
        "dezessete",
        "dezoito",
        "dezenove"
    ];
}
