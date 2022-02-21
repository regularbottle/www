<?php
include '../libreria.php';
/*7 Elencare le date di soggiorno ed inserire un link alla pag. partenza.php
a cui inviare la data di arrivo e il numero di giorni
La pagina partenza scrive la data di arrivo, il numero di giorni e la data di partenza (cercare soluzioni on-line)*/
echo "Dettagli per il cliente: " . $_GET['nome'] . "<br>";
echo "Data di arrivo: " . date_db2user($_GET['data']) . " giorni di permanenza: " . $_GET['giorni'];
$date = $_GET['data'];
echo " il giorno di partenza è " . date_db2user(date('Y-m-d', strtotime($date . ' + ' . $_GET['giorni'] . ' days')));


