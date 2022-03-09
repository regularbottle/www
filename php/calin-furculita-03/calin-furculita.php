<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet">
    <title>Verifica PHP - 09/03/2022</title>
</head>
<body>
<div class="container">
<?php
include '../libreria.php';
function is_passed($data, $giorni): bool
{
    $tempo_passato = (time() - strtotime($data)) / (60 * 60 * 24);
    if ($tempo_passato <= $giorni)
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
    $newArticle = ['titolo_articolo' => $_REQUEST['titolo_articolo'], 'data_articolo' => $_REQUEST['data_articolo'], 'testo_articolo' => $_REQUEST['testo_articolo']];
    foreach ($articoli as $key) {
        if ($key['titolo_articolo'] == $newArticle['titolo_articolo']) {
            $isNewArticle = 1;
        }
    }
    if ($isNewArticle == 0) {
        $articoli[] = $newArticle;
    }
    foreach ($articoli as $key) {
        echo "L'articolo con titolo: " . $key['titolo_articolo'] . " pubblicato in data " . date_db2user($key['data_articolo']) .
            " con il sequente testo: " . $key['testo_articolo'] . "<br>";
    }
}

echo "<hr>";

$i = 0;
foreach ($articoli as $key) {
    $timePassed = (time() - strtotime($key['data_articolo'])) / (60 * 60 * 24);
    if (is_passed($key['data_articolo'], 30)) {
        $articoli[$i]['isNew'] = 1;
    }
    $distanceFromToday[] = [$timePassed, $key['titolo_articolo']];
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
    echo $key['titolo_articolo'] . ": " . $key['testo_articolo'] . "</br>" .
        "<a href=./aritcolo.php?nome=" . str_replace(" ", "%20", $key['titolo_articolo']) . "> Dettagli </a><br>";
}

echo "<hr>";

$exampleDate = "2022-03-01";
$exampleDays = 30;
echo "La data " . date_db2user($exampleDate);
if (is_passed($exampleDate, $exampleDays))
    echo " e' ";
else
    echo " non e' ";
echo " più recente di " . $exampleDays;

echo "<hr>";

$pubblishedArticlesCurrentMonth = 0;
$currentYear = from_date(date("Y-m-d"), "year");
$currentMonth = month(from_date(date("Y-m-d"), "month"));
foreach ($articoli as $key) {
    if (is_passed($key['data_articolo'], date('j')) && from_date($key['data_articolo'], "year") == $currentYear)
        $pubblishedArticlesCurrentMonth++;
}

echo "Nel mese di " . $currentMonth . " sono stati pubblicati " . $pubblishedArticlesCurrentMonth . " articoli";
?>
</div>
<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
