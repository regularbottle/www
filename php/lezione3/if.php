<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Lezione 3 - If</title>
    <style>
        .container {
            display: flex;
            justify-content: flex-start;
        }

        @media all and (max-width: 800px) {
            .container {
                justify-content: space-around;
            }
        }

        @media all and (max-width: 500px) {
            .container {
                flex-direction: column;
            }
        }

        .item {
            padding: 2%;
        }
    </style>
</head>
<body>
<div class="container" id="lezione3If">
    <div class="item" id="if">
        <?php
        $a = 1;
        $b = 2;

        if ($a > $b) {
            echo "$a maggiore $b";
        } else if ($a == $b) {
            echo "$a uguale $b";
        } else {
            echo "$a minore $b";
        }
        echo "<br>fine";
        ?>
    </div>
    <div class="item" id="esercizio2If">
        <?php
        //date due var a e b fare in modo che a sia maggiore di b
        try {
            $a = random_int(1, 100);
        } catch (Exception $e) {
        }
        try {
            $b = random_int(1, 100);
        } catch (Exception $e) {
        }
        echo "I valori iniziali sono <ol type=\"a\"><li>$a</li><li>$b</li></ol>";
        $c = 0;
        if ($a < $b) {
            $c = $b;
            $b = $a;
            $a = $c;
        }
        echo "Ora i valori sono <ol type=\"a\"><li>$a</li><li>$b</li></ol>";
        ?>
    </div>
    <div class="item" id="esercizio3If">
        <?php
        try {
            $totale = random_int(1, 1000);
        } catch (Exception $e) {
        }
        try {
            $ore = random_int(1, 100);
        } catch (Exception $e) {
        }
        if ($totale < $ore) {
            $c = $ore;
            $ore = $totale;
            $totale = $c;
        }

        $resto = $totale % $ore;
        $servono = ($totale - $resto) / $ore;

        echo "Servono " . $servono . " lezioni per finire il corso da $totale ore";
        if ($resto != 0) {
            if ($resto == 1) {
                echo " facendo $ore ore ogni volta pi?? una lezione da un'ora";
            } else {
                echo " facendo $ore ore ogni volta pi?? una lezione da " . $resto . " ore";
            }
        } else {
            echo " facendo $ore ore ogni volta";
        }
        ?>
    </div>
    <div class="item" id="esercizio4If">
        <?php
        try {
            $x = random_int(1, 100);
        } catch (Exception $e) {
        }
        if ((1 <= $x) && ($x <= 50)) {
            echo "Il numero $x ?? compreso tra 1 e 50!";
        } else {
            echo "Il numero $x non ?? compreso tra 1 e 50!";
        }
        echo "<br>";
        if ((30 > $x) || ($x > 40)) {
            echo "Sei idoneo a fare il corso perch?? hai $x anni!";
        } else {
            echo "Non puoi accedere a questo corso perch?? hai $x anni";
        }
        ?>
    </div>
</div>
</body>
</html>

