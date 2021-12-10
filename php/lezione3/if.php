<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Lezione 3</title>
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
            padding-left: 5%;
            padding-right: 5%;
        }
    </style>
</head>
<body>
<div class="container" id="lezione3">
    <div class="item" id="if">
        <?php
        $a = 1;
        $b = 2;

        if ($a>$b) {
            echo "$a maggiore $b";
        } else if ($a == $b) {
            echo "$a uguale $b";
        } else {
            echo "$a minore $b";
        }
        echo "<br>fine";

        echo "<hr>";
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
        if ($a<$b) {
            $c=$b;
            $b=$a;
            $a=$c;
        }
        echo "Ora i valori sono <ol type=\"a\"><li>$a</li><li>$b</li></ol>";
        ?>
    </div>
</div>
</body>
</html>

