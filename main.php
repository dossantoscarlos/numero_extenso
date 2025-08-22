<?php
function valorPorExtenso($valor, $maiusculas = false) {
    if (!is_numeric($valor)) {
        // remove pontos e converte vírgula em ponto
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
    }

    $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    $plural   = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove");
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");

    $valor = number_format($valor, 2, ".", ".");
    $inteiro = explode(".", $valor);

    foreach ($inteiro as $key => $value) {
        $inteiro[$key] = str_pad($value, 3, "0", STR_PAD_LEFT);
    }

    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
    $rt = "";

    foreach ($inteiro as $i => $value) {
        $rc = (($value > 100) && ($value < 200)) ? "cento" : $c[$value[0]];
        $rd = ($value[1] < 2) ? "" : $d[$value[1]];
        $ru = ($value > 0) ? (($value[1] == 1) ? $d10[$value[2]] : $u[$value[2]]) : "";

        $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
        $t = count($inteiro) - 1 - $i;

        if ($r) {
            $r .= " " . ($value > 1 ? $plural[$t] : $singular[$t]);
        }

        if ($r) {
            if (($i > 0) && ($i <= $fim) && ($inteiro[0] > 0)) {
                $rt .= (($i < $fim) ? ", " : " e ");
            }
            $rt .= $r;
        }
    }

    return $maiusculas ? strtoupper(trim($rt)) : trim($rt);
}

// ----------------------
// Execução via CLI
// ----------------------
if ($argc < 2) {
    echo "Uso: php " . $argv[0] . " \"53.042.635.304,45\"\n";
    exit(1);
}

$valor = $argv[1];
echo valorPorExtenso($valor) . PHP_EOL;
