<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifica PHP - 31/01/2022</title>
</head>
<body>
<?php
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
$categoria['categoria2'] = ['nome' => "maglioni", 'n_prodotti' => "12", 'fatturato' => "800"];
$categoria['categoria3'] = ['nome' => "pantaloni", 'n_prodotti' => "5", 'fatturato' => "650"];

$somma_prodotti = 0;
$valore_medio_fatturato = 0;
$indice_colore = 0;

foreach ($categoria as $item => $value) {
    echo "<p style='background-color: " . alternate_colors($indice_colore%2) . "'>Nome: " . $value['nome'] . "</p>";
    $somma_prodotti += $value['n_prodotti'];
    $fatturato[] = [$value['fatturato'], $value['nome']];
    $valore_medio_fatturato += $value['fatturato'];
    $indice_colore++;
}

echo "<hr>";

echo "Somma dei prodotti: " . $somma_prodotti . "<br>";

echo "<hr>";

sort($fatturato);
echo "La categoria con il fatturato più basso è: " . $fatturato[0][1] . " con " . $fatturato[0][0] . "€<br>";
echo "La categoria con il fatturato più alto è: " . $fatturato[count($fatturato) - 1][1] . " con " . $fatturato[count($fatturato) - 1][0] . "€<br>";

echo "<hr>";

echo "Il valore medio del fatturato è: " . $valore_medio_fatturato / count($fatturato) . "€<br>";

echo "<hr>";

for ($i = 0; $i < count($categoria); $i++) {
    $categoria['categoria' . ($i + 1)]['anno'] = date('Y');
}
echo "<table style='border: 1px solid black'>
            <caption><h3>Prodotti</h3></caption>
            <thead><tr><th>Nome</th><th>Quantità</th><th>Fatturato</th><th>Anno</th></tr></thead>
            <tbody>";
foreach ($categoria as $item => $value) {
    echo "<tr>
                <td>" . $value['nome'] . "</td> 
                <td>" . $value['n_prodotti'] . "</td> 
                <td>" . $value['fatturato'] . "€</td> 
                <td>" . $value['anno'] . "</td>
          </tr>";
}
echo "</tbody></table>";
echo "<hr>";

$anno_corrente = date('Y');
$indice_fatturato = 0;

for ($i = $anno_corrente; $i > ($anno_corrente - 10); $i--) {
    $fatturato_annuo[$i] = $valore_medio_fatturato - 100 * $indice_fatturato;
    $indice_fatturato++;
}

foreach ($fatturato_annuo as $item => $value) {
    echo "Per l'anno: " . $item . " il fatturato era di: " . $value . "€<br>";
}

?>
</body>
</html>
