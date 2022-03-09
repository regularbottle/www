<?php
include '../libreria.php';
function is_passed ($data, $giorni): bool
{
    $dateToday = time();
    $data_passata = strtotime($data);
    $tempo_passato = ($dateToday - $data_passata) / (60 * 60 * 24);
    if ($tempo_passato < $giorni)
        return true;
    else
        return false;
}

$articolo1 = ['titolo_articolo' => "Tutti pazzi per il Paddle", 'data_articolo' => "2021-03-10", 'testo_articolo' => "Sai giocare a Paddle?"];
$articolo2 = ['titolo_articolo' => "Gli Alpini a Rimini", 'data_articolo' => "2022-03-07", 'testo_articolo' => "Finalmente il grande raduno"];

$articoli = [$articolo1, $articolo2];

$isEmpty = 1;
$isNewArticle = 0;

foreach ($_REQUEST as $key => $value) {
    if (empty($value[$key])) {
        $isEmpty = 0;
    }
}
if ($isEmpty == 0) {
    $articolo_nuovo = ['titolo_articolo' => $_REQUEST['titolo_articolo'], 'data_articolo' => $_REQUEST['data_articolo'], 'testo_articolo' => $_REQUEST['testo_articolo']];
    foreach ($articoli as $key) {
        if ($key['titolo_articolo'] == $articolo_nuovo['titolo_articolo']) {
            $isNewArticle = 1;
        }
    }
    if ($isNewArticle == 0) {
        $articoli[] = $articolo_nuovo;
    }
    foreach ($articoli as $key) {
        echo "L'articolo con titolo: " . $key['titolo_articolo'] . " pubblicato in data " . date_db2user($key['data_articolo']) .
            " con il sequente testo: " . $key['testo_articolo'] . "<br>";
    }
}

echo "<hr>";

$dateToday = time();
$i = 0;
foreach ($articoli as $key) {
   $data_articolo = strtotime($key['data_articolo']);
   $tempo_passato = ($dateToday - $data_articolo) / (60 * 60 * 24);
   if ($tempo_passato <= 30) {
       $articoli[$i]['isNew'] = 1;
   }
   $distanceFromToday[] = [$tempo_passato, $key['titolo_articolo']];
   $i++;
}
sort($distanceFromToday);
echo "L'articolo più recente è \"" . $distanceFromToday[0][1] . "\"";

echo "<hr>";

foreach ($articoli as $key) {
    if (isset($key['isNew'])) {
        if ($key['isNew'] == 1) {
        echo "<span style='color:red'>NEW</span> ";
        }
    }
    echo $key['titolo_articolo'] .  ": " . $key['testo_articolo'] ."</br>".
        "<a href=./aritcolo.php?nome=" . str_replace(" ", "%20", $key['titolo_articolo']) . "> Dettagli </a><br>";
}

echo "<hr>";

$data = "2022-03-01";
$giorniFunzione = 30;
echo "La data ". date_db2user($data);
if (is_passed($data, $giorniFunzione))
     echo " e' ";
else
    echo " non e' ";
echo " più recente di " . $giorniFunzione;

echo "<hr>";

$articoliPubblicatiMese = 0;
$anno_corrente = from_date(date("Y-m-d"), "year");
$mese_corrente = month(from_date(date("Y-m-d"), "month"));
foreach ($articoli as $key) {
    if (is_passed($key['data_articolo'], date('j')) && from_date($key['data_articolo'], "year") == $anno_corrente)
        $articoliPubblicatiMese++;
}

echo "Nel mese di " . $mese_corrente . " sono stati pubblicati " . $articoliPubblicatiMese . " articoli";

