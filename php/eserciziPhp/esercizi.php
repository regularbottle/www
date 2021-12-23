<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            vertical-align: auto;
        }
    </style>

</head>
<body>

    <?php
    function correctNumber(int $a): string
    {
        if ($a<=1) return "alle unità";
        else return "alla $a decina";
    }

    function isPrime(int $a): bool
    {
        $primo = 0;
        for ($i = 0; $i <= $a; $i++) {
            if ($i!=0) {
                if (!($a % $i))  {
                    $primo++;
                }
            }
        }
        if ($primo <=2) return true;
        return false;
    }

    $a = 10;
    $b = 20;
    $media = ($a+$b) / 2;
    echo "La media tra $a e $b è $media";
    echo "<hr>";
    //fine 1

    $x = 171;
    if (!($x % 3)) echo "$x è un multiplo di 3";
    else echo "$x non è un multiplo di 3";
    echo "<hr>";
    //fine 2

    $x = 191;
    $y = 101;

    echo "I valori iniziali sono <ol type=\"a\"><li>$x</li><li>$y</li></ol>";
    $z=$y;
    $y=$x;
    $x=$z;
    echo "Ora i valori sono <ol type=\"a\"><li>$x</li><li>$y</li></ol>";
    echo "<hr>";
    //fine 3

    $f1 = 22;
    $f2 = 26;
    if ($f1>$f2) {
        $temp=$f2;
        $f2=$f1;
        $f1=$temp;
    }
    $differenzaEta = $f2 - $f1;

    echo "La differenza d'età tra i due fratelli è di $differenzaEta anni";
    echo "<hr>";
    //fine 4

    $numero = 423;
    $quantitaCifre = strlen("$numero");

    echo "Il numero $numero appartiene ".correctNumber($quantitaCifre);
    echo "<hr>";
    //fine 5

    $totale = 105;
    $ore = 8;

    $resto = $totale % $ore;
    $servono = ($totale - $resto) / $ore;

    echo "Servono ".$servono." settimane per finire il corso da $totale ore";
    if ($resto != 0) {
        if ($resto == 1) {
            echo " facendo $ore ore ogni settimana più una settimana da un'ora";
        } else {
            echo " facendo $ore ore ogni settimana più una settimana da ".$resto." ore";
        }
    } else {
        echo " facendo $ore ore ogni settimana";
    }
    echo "<hr>";
    //fine 6

    $nome = "Calin";
    $cognome = "Furculita";

    if (strlen($nome)<strlen($cognome)) echo "Il cognome è più lungo del nome";
    else echo "Il nome è più lungo del nome";
    echo "<hr>";
    //fine 7

    $testo = "Ciao!";
    if (preg_match('~^\p{Lu}~u', $testo)) echo "La prima lettera della parola $testo è maiuscola!";
    else echo "La prima lettera della parola $testo non è maiuscola!";
    echo "<hr>";

    $testo = "ciao!";
    if ($testo[0] >= 'A' && $testo[0]<='Z') echo "La prima lettera della parola $testo è maiuscola!";
    else echo "La prima lettera della parola $testo non è maiuscola!";
    echo "<hr>";
    //fine 8

    $x = 1555;
    $a = 1656;
    $b = 1243;
    if ($a>$b) {
        $temp=$b;
        $b=$a;
        $a=$temp;
    }
    if  (($a<=$x) && ($x<=$b)) {
        echo "Il numero $x è compreso tra $a e $b!";
    } else {
        echo "Il numero $x non è compreso tra $a e $b!";
    }
    echo "<hr>";
    //fine 9

    $numero = 10;
    echo "<table>";
    for ($iRow = 0; $iRow < 9; $iRow++) {
        echo "<tr>";
        for ($iColumn = 0; $iColumn < 10; $iColumn++) {
            if (isPrime($numero)) echo "<td style='background-color: rosybrown'>";
            else echo "<td>";
            if (!(($numero % 2))) echo ($numero)." PARI ";
            else echo ($numero)." DISPARI ";
            echo "</td>";
            $numero++;
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<br>";

    for ($i=10; $i<=30; $i++) {
        if (($i % 2)) echo " ".$i." ";
    }

    echo "<hr>";
    //fine 10

    for ($i=1; $i<=100; $i++) {
        if (!($i % 7)) echo "Il numero $i è un multiplo di 7!<br>";
    }
    echo "<hr>";
    //fine 11

    //stampare l'elenco dei giorni che mancano a natale solo se siamo nel mese di dicembre
    $dataCorrente = date('d');
    $dataTarget = 25;
    if (date('m') == 12) {
        while ($dataCorrente < $dataTarget) {
            echo "Oggi è il $dataCorrente di ".date('M').", mancano ".($dataTarget-$dataCorrente)." giorni a natale! <br>";
            $dataCorrente++;
        }
    }
    echo "Oggi è natale, Tanti auguri!<hr>";
    //fine natale

    //calcolare ed elencare per quali numeri è divisibile il numero mem in $numero
    $numero = 205;
    echo "I divisori di $numero sono: ";
    for ($i = 0; $i <= $numero; $i++) {
        if ($i!=0) {
            if (!($numero % $i))  {
                echo "$i ";
            }
        }
    }
    if (isPrime($numero)) echo "<br>$numero è un numero primo";

    echo "<br>I divisori di $numero sono: ";
    for ($i = $numero; $i != 0; $i--) {
        if (!($numero % $i))  {
            echo "$i ";
        }
    }
    echo "<hr>";

    //fare l'ex di prima da $inizio a $fine
    $inizio = 1;
    $fine = 30;
    for ($numero = $inizio; $numero<=$fine; $numero++) {
        echo "<br>I divisori di $numero sono: ";
        for ($i = 0; $i <= $numero; $i++) {
            if ($i!=0) if (!($numero % $i))  {
                echo "$i ";
            }
        }
        if (isPrime($numero)) echo " è un numero primo";
    }
    echo "<hr>";

    //tabellina
    $numero = 10;
    echo "<table><tr style='background-color: palegoldenrod'><td></td>"; for ($i = 1; $i <=$numero;$i++) echo "<td>$i</td>";
    for ($iRow = 1; $iRow <= $numero; $iRow++) {
        echo "<tr><td style='background-color: palegoldenrod'>$iRow</td>";
        for ($iColumn = 1; $iColumn <= $numero; $iColumn++) {
            echo "<td>".($iRow*$iColumn)."</td>";
        }
        echo "</tr>";
    }
    echo "</table><br><hr>";

    //esercizio uno di esercizi-cicli-array.dom
    $inizio = -10;
    $ripetizioni = 20;

    for ($i = 50; $i>(50-$ripetizioni); $i--) {
        echo "$i ";
    }
    echo "<br>";
    if ($inizio>0) {
        for ($i = $inizio; $i>0; $i--) {
        if ($i == date('j')) echo ($i-1)."<span style='color: red'><strong>$i</strong></span>".($i+1)."<br>";
        else echo ($i-1)."<span style='color: red'>$i</span>".($i+1)."<br>";
        }
    } else {
        for ($i = $inizio; $i<0; $i++) {
            echo ($i-1)."<span style='color: red'>$i</span>".($i+1)."<br>";
        }
    }
    echo "<hr>";

    //esercizio due di esercizi-cicli-array.doc
    $votoStudenti = [100, 20, 50, 70, 90, 80, 66, 89, 99, 101, 101, 89];
    $postiSpecializzandi = 4;
    $mediaSufficienti = 0;
    $lodi = [];
    $specializzandi = [];
    $votoSufficiente = [];
    for ($i = 0; $i < count($votoStudenti); $i++) {
        if ($votoStudenti[$i] >= 60) {
            echo "<strong>".$votoStudenti[$i]."</strong> ";
            $votoSufficiente[] = $votoStudenti[$i];
            $mediaSufficienti += $votoStudenti[$i];
            if ($votoStudenti[$i] >= 80) {
                $specializzandi[] = $votoStudenti[$i];
                if ($votoStudenti[$i] == 101) {
                    $lodi[] = $votoStudenti[$i];
                }
            }
        }
        else {
            echo "<i>".$votoStudenti[$i]."</i> ";
        }
    }
    echo "<table style='border: 1px solid black; border-collapse: collapse'><td>Sono state assegnate ".count($lodi)." lodi</td></table>";

    echo "<br>La media delle sufficienze è ".number_format(($mediaSufficienti/count($votoSufficiente)));

    echo "<br>Il numero di persone con i requisiti neccessari è: ".count($specializzandi);
    echo "<br>Gli specializzandi ammessi sono ";
    if ((count($specializzandi) > $postiSpecializzandi)) {
        echo $postiSpecializzandi.", rimangono in lista d'attesa il "
            .number_format(((count($specializzandi) - $postiSpecializzandi) * 100) / count($specializzandi)).
            "% di coloro che hanno i requisiti necessari";
    }
    else echo count($specializzandi);

    echo "<hr>";

    //esercizi di quando non c'ero
    //1
    $persone = ["Rossi", "Verdi", "Gialli"];
    $persona = "Verdi";
    $minimo = $persona[0];
    $trovato = false;
    $posizione = 0;
    for ($i=0; $i<count($persone); $i++) {
        $sfondo = "#808080";
        if ($i%3==0) $sfondo = "#A9A9A9";
        else if ($i%3==1) $sfondo = "#DDDDDD";
        echo "<div style='background-color: $sfondo'>".$persone[$i]."</div>";

        if ($persona == $persone[$i]) {
            $trovato = true;
            $posizione = $i+1;
        }

        if ($persone[$i]<$minimo) $minimo = $persone[$i];
    }
    //2
    if ($trovato) echo "</br>Trovato $persona in posizione $posizione";
    else echo "Non ho trovato $persona nella lista";
    //3
    if (date("i") == 30) {
        $persone[] = "Nuovi";
        echo "<br>E' stato inserito Nuovi nella lista di attesa con posizione ".count($persone);
    }
    //4
    echo "<br>In ordine alfabetico il primo in lista di attesa è $minimo";
    //5
    $numero_persone = count($persone);
    $persone_giorno = 1;
    $ore_lavorate = date("H") - 8;
    $minuti_lavorati = date("i");
    if ($numero_persone>$persone_giorno) {
            echo "<br>Rimangono in lista d'attesa il "
            .number_format((($numero_persone - $persone_giorno) * 100) / $numero_persone, 2).
            "% di persone";
    }
    else echo "<br>".$numero_persone;

    if ((date("H"))>13) {
        $gestite_ora = ($numero_persone <= $persone_giorno)?$numero_persone:$persone_giorno;
    } else {
        if ($ore_lavorate < 0) $gestite_ora = 0;
        else  $gestite_ora = ($ore_lavorate * 6) + floor($minuti_lavorati/10);
    }

    echo "<br>Abbiamo gestito $gestite_ora persone sino a ora";
    ?>
</body>
</html>