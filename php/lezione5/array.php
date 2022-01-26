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
$a = [1, 2, 3, "pippo", "pluto", false];
$a[3] = "paperino";
$a[] = "ciao";
for ($i = 0; $i < count($a); $i++) {
    echo "$i => " . $a[$i] . "<br>";
}

echo "<hr>";

//esercizi
//cercare un elemento $e all'interno dell'array $a
// quante volte compare?
// in quali posizioni?
$a = array(1, 2, 4, 56, 1, 1, 1);
$e = 1;
$compare = 0;
$posizione = 0;
for ($i = 0; $i < count($a); $i++) {
    if ($e == $a[$i]) {
        $compare++;
        $posizione[] = $i;
    }
}
echo "$e compare $compare volte in queste posizioni: ";
for ($i = 0; $i < count($posizione); $i++) {
    echo $posizione[$i] . " ";
}
?>
</body>
</html>