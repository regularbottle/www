<?php
$nome = $_REQUEST['nome'];
$sesso = $_REQUEST['sesso'];
$cap = $_REQUEST['cap'];
$localita = $_REQUEST['localita'];
$indirizzo = $_REQUEST['indirizzo'];
$abitazione = $_REQUEST['abitazione'];

echo "Ciao $nome, ecco i dati che hai compilato:<br>";
if ($sesso == 'f') echo "Sesso: Femmina<br>"; else echo "Sesso: Maschio<br>";
echo "CAP: " . $cap . "<br>";
echo "Città: " . $localita . "<br>";
echo "Indirizzo: " . $indirizzo . "<br>";
echo "Tipo di abitazione: " . $abitazione . "<br>";
$animali = ['gatto', 'cane', 'cavallo', 'mucca'];
echo "I tuoi animali preferiti:<ul>";
foreach ($animali as $animale) {
    if (array_key_exists($animale, $_REQUEST)) echo "<li>" . ucfirst($animale) . "</li>";
}
echo "</ul>";

foreach ($_FILES as $key => $file) {
    $from = $file['tmp_name'];
    $to = $file['name'];
    if (move_uploaded_file($from, $to)) echo "File/s caricato/i con successo<br>";
    else echo "Errore durante il caricamento<br>";

    $tmp_file = fopen($file['name'], "r");
    if ($tmp_file) {
        while (($line = fgets($tmp_file)) !== false) {
            echo $line . "<br>";
        }
        fclose($tmp_file);
    } else echo "ERROR while reading";
}