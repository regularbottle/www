<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">
    <!--- Stylesheet -->
    <link href="style.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet">
    <title>Verifica PHP - 31/01/2022</title>
</head>
<body>
<?php
include '../libreria.php';
function alternate_colors(int $colori): string
{
    switch ($colori) {
        case 0:
            return "#F0F0F0";
        case 1:
            return "#FFFFFF";
        default:
            return "";
    }
}

$categoria['categoria1'] = ['nome' => "scarpe", 'n_prodotti' => "20", 'fatturato' => "1200"];
$categoria['categoria2'] = ['nome' => "maglioni", 'n_prodotti' => "12", 'fatturato' => "1800"];
$categoria['categoria3'] = ['nome' => "pantaloni", 'n_prodotti' => "55", 'fatturato' => "2650"];
$categoria['categoria33'] = ['nome' => "berretti", 'n_prodotti' => "23", 'fatturato' => "650"];
$categoria['categoria34'] = ['nome' => "camice", 'n_prodotti' => "53", 'fatturato' => "6650"];
$categoria['categoria35'] = ['nome' => "jeans", 'n_prodotti' => "61", 'fatturato' => "1650"];
$categoria['categoria36'] = ['nome' => "sciarpe", 'n_prodotti' => "235", 'fatturato' => "7850"];
$categoria['categoria37'] = ['nome' => "guanti", 'n_prodotti' => "2053", 'fatturato' => "1230"];

$somma_prodotti = 0;
$valore_medio_fatturato = 0;
$indice_colore = 0;

foreach ($categoria as $item => $value) {
    echo "<p style='background-color: " . alternate_colors($indice_colore % 2) . "'>Nome: " . $value['nome'] . "</p>";
    $somma_prodotti += $value['n_prodotti'];
    $fatturato[] = [$value['fatturato'], $value['nome']];
    $valore_medio_fatturato += $value['fatturato'];
    $indice_colore++;
}

echo "<hr>";

echo "Somma dei prodotti: " . $somma_prodotti . "<br>";

echo "<hr>";

sort($fatturato);
echo "La categoria con il fatturato pi?? basso ??: " . $fatturato[0][1] . " con " . $fatturato[0][0] . "???<br>";
echo "La categoria con il fatturato pi?? alto ??: " . $fatturato[count($fatturato) - 1][1] . " con " . $fatturato[count($fatturato) - 1][0] . "???<br>";

echo "<hr>";

echo "Il valore medio del fatturato ??: " . $valore_medio_fatturato / count($fatturato) . "???<br>";

echo "<hr>";

foreach ($categoria as $item => $value) {
    $categoria[$item]['anno'] = date('Y');
}
print_as_table($categoria, "Prodotti");

echo "<hr>";

$anno_corrente = date('Y');
$indice_fatturato = 0;
$fatturato_annuo = array();

for ($i = $anno_corrente; $i > ($anno_corrente - 10); $i--) {
    $fatturato_annuo[$i] = $valore_medio_fatturato - 100 * $indice_fatturato;
    $indice_fatturato++;
}

foreach ($fatturato_annuo as $item => $value) {
    echo "Per l'anno: " . $item . " il fatturato era di: " . $value . "???<br>";
}
?>

<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>