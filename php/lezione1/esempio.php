<!DOCTYPE html>
<html lang="it">

<body>
<?php
try {
    $limite = random_int(1, 100);
} catch (Exception $e) {
}
$numeri = range(1, 1000);
shuffle($numeri);
$numeri = array_slice($numeri, 0, $limite + 1);

var_dump($numeri);

$piupiccolo = $numeri['0'];
for ($i = 0; $i < $limite; ++$i) {
    if ($piupiccolo > $numeri[$i + 1]) {
        $piupiccolo = $numeri[$i + 1];
    }
}
echo "<br>Il numero piu' piccolo è ", $piupiccolo;
?>
</body>

</html>