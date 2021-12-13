<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
    function correctNumber(int $a) {
        switch ($a) {
            case $a<=1: return "alle unità";
            default: return "alla $a decina";
        }
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
    //fine 8

    for ($i=10; $i<100; $i++) {
        if (!(($i) % 2)) echo "<td>".($i)." PARI <br>";
        else echo "<td>".($i)." DISPARI <br>";
    }

    echo "</table>";
        for ($i=10; $i<=30; $i++) {
            if (($i % 2)) echo " ".$i."<br>";
        }

    echo "<hr>";
    //fine 9

    for ($i=1; $i<=100; $i++) {
        if (!($i % 7)) echo "Il numero $i è un multiplo di 7!<br>";
    }
    echo "<hr>";
    //fine 10
    ?>
</body>
</html>


