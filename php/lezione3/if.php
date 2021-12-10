<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Lezione 3</title>
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
        ?>
    </div>
</div>
</body>
</html>

