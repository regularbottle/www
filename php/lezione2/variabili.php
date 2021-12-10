<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Variabili</title>
</head>
<body>
    <?php
        $stringa = "ecco la mia nuova variabile";
        //echo $stringa." "."frase concatenata <br>";
        $stringa2 = "seconda riga";
        $stringa = 1; //intero
        $var = true;
        //echo $var."<br>";
        //echo $stringa." <br> $stringa2";
        // $stringa = "ora è cambiata";
        // echo $stringa;
        //echo "stringa";
        $var = "risultato";
        $stringa = "var";
        echo "test con 2 $$: ". $$stringa;

        //Operatori
        $a=10;
        $b=2;
        $c = $a+$b;
        //echo "$a + $b = ".($a + $b);
        //echo $a." + ".$b." = ". $c;

        //echo "3" + 1;

        $x = +5;
        $x += 5;
        $stringa = "pippo"; echo $stringa;
        $stringa .="!"; $stringa = $stringa . "!";
        echo $stringa;

        //operatore %
        //lo faremo dopo Natale...
        echo "<hr>";

        $i = 1;
        echo "<div>riga 1: ". ( ( ($i++ % 2) == 0)?"pari":"dispari" ) ." </div>";
        //++$i; //$i++; // $i = $i + 1; //2
        echo "<div>riga 2: ".( ( ($i++ % 2) == 0)?"pari":"dispari" )." </div>";
        //$i = $i + 1; //3
        echo "<div>riga 3: ". ( ( ($i++ % 2) == 0)?"pari":"dispari" ) ." </div>";
        //$i = $i + 1; //4
        echo "<div>riga 4: ". ( ( ($i++ % 2) == 0)?"pari":"dispari" ) ."</div>";


        //operatore ternario
        echo "<hr>";
        $orario = date("H");
        //prima delle 13 orario_pausa=12 
        //alrimenti orario_pausa=17
        $orario_pausa = ($orario < 13)? 12 : 17;
        $pausa=( ($orario == $orario_pausa )?"pausa":"lezione");
        echo "è ore di fare ".$pausa;

    ?>
</body>
</html>