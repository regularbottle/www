<?php
/**
 * @param $date
 * @return string
 */

function date_db2user($date): string
{
    $y = substr($date, 0, 4);
    $m = substr($date, 5, 2);
    $d = substr($date, 8, 2);
    return $d . "/" . $m . "/" . $y;
}

function from_date($date, $particle): string
{
    switch ($particle) {
        case 'year':
            return substr($date, 0, 4);
        case 'month':
            return substr($date, 5, 2);
        case 'day':
            return substr($date, 8, 2);
        default:
            return "";
    }
}

function get_L2_Keys(array $array): array
{
    $result = array();
    foreach ($array as $sub) {
        $result = array_merge($result, $sub);
    }
    return array_keys($result);
}

function print_as_table(array $array, string $nome_tabella)
{
    $chiavi = get_L2_Keys($array);

    echo "<table class='table table-responsive table-bordered table-striped'>
            <caption><h3>$nome_tabella</h3></caption>
            <thead><tr>";
    for ($i = 0; $i < count($chiavi); $i++) {
        echo "<th>" . ucfirst($chiavi[$i]) . "</th>";
    }
    echo "</tr></thead><tbody>";
    foreach ($array as $v1) {
        echo "<tr>";
        foreach ($v1 as $v2) {
            echo "<td> $v2</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
}

function month(int $mese): string
{
    switch ($mese) {
        case 1:
            return "Gennaio";
        case 2:
            return "Febbraio";
        case 3:
            return "Marzo";
        case 4:
            return "Aprile";
        case 5:
            return "Maggio";
        case 6:
            return "Giugno";
        case 7:
            return "Luglio";
        case 8:
            return "Agosto";
        case 9:
            return "Settembre";
        case 10:
            return "Ottobre";
        case 11:
            return "Novembre";
        case 12:
            return "Dicembre";
        default:
            return "";
    }
}

function day(int $giorno): string
{
    switch ($giorno) {
        case 0:
            return "Domenica";
        case 1:
            return "Lunedì";
        case 2:
            return "Martedì";
        case 3:
            return "Mercoledì";
        case 4:
            return "Giovedì";
        case 5:
            return "Venerdì";
        case 6:
            return "Sabato";
        default:
            return "";
    }
}