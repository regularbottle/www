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

function date_user2db($date): string
{
    $d = substr($date, 0, 2);
    $m = substr($date, 3, 2);
    $y = substr($date, 7, 4);
    return $y . "-" . $m . "-" . $d;
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

function same_year ($timestamp) {
    if (from_date($timestamp, 'year') == date('Y')) {
        return 'true';
    } else{
        return 'false';
    }
}