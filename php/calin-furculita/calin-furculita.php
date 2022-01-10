<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifica PHP</title>
</head>
<body>
<?php
    function month(int $mese): string
    {
        switch($mese) {
            case 1: return "Gennaio";
            case 2: return "Febbraio";
            case 3: return "Marzo";
            case 4: return "Aprile";
            case 5: return "Maggio";
            case 6: return "Giugno";
            case 7: return "Luglio";
            case 8: return "Agosto";
            case 9: return "Settembre";
            case 10: return "Ottobre";
            case 11: return "Novembre";
            case 12: return "Dicembre";
            default: return "";
        }
    }
    function nrDaysMonth(int $mese): int
    {
        switch ($mese) {
            case 11: case 4:case 6:case 9: return 30;
            case 2:  if(!(date("y")%4)) return 29; else return 28;
            default: return 31;
        }
    }

    function daysPassed(int $mese, int $giorni): int
    {
        $passati = 0;
        for ($i = 0; $i<$mese-1; $i++) {
            $passati += nrDaysMonth($i+1);
        }
        return $passati + $giorni;
    }

    $temperatura_media = 0;
    $giorni_menozero = 0;
    $giorni_passati = daysPassed(date('m'),date('d'));
    for ($i = 0; $i<$giorni_passati; $i++) {
        $temperature[] = rand(-10,30);
        $temperatura_media += $temperature[$i];
        if ($temperature[$i]<0) $giorni_menozero++;
    }

    echo "La Temperatura media dell'anno è ".number_format($temperatura_media/count($temperature), 2);
    echo "<br>Ci sono stati $giorni_menozero giorni con temperature sotto lo zero<br>";
    $indice_totale = 0;
    for ($i_mese = 0; $i_mese < date('m'); $i_mese++) {
        $temperatura_media_mese = 0;
        echo "Per il mese di ".month($i_mese + 1)." le temperature sono:<ol style='list-style-type: decimal;'>";
        for ($i = 0; $i < nrDaysMonth(($i_mese+1)); $i++) {
            if ($indice_totale<$giorni_passati) {
                echo "<li> la temperatura era " .$temperature[$indice_totale]. "°C</li>";
                $temperatura_media_mese += $temperature[$indice_totale];
                $indice_totale++;
            }
        }
        echo "</ol>La temperatura media di ".month($i_mese+1)." è ".number_format($temperatura_media_mese/nrDaysMonth($i_mese+1), 2)."°C<br>";
    }
?>
</body>
</html>
