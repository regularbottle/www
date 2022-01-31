<?php
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

function nrDaysMonth(int $mese): int
{
    switch ($mese) {
        case 11:
        case 4:
        case 6:
        case 9:
            return 30;
        case 2:
            if (!(date("y") % 4)) return 29; else return 28;
        default:
            return 31;
    }
}

$indice = 0;
$media = 0;
for ($m = 1; $m <= 12; $m++) {
    $mesi[month($m)] = ['t' => rand(-10, 30), 'giorni' => nrDaysMonth($m)];
}
foreach ($mesi as $mese => $array_mese) {
    echo "$mese (" . $array_mese['giorni'] . " giorni): " . $array_mese['t'] . "<br>";
    $media += $array_mese['t'];
    $indice++;
}
echo "La temperatura media è: " . ($media / $indice) . "<br>";