<?php
$cap = $_GET['cap'];
$localita = $_GET['localita'];
$indirizzo = $_GET['indirizzo'];
$abitazione = $_GET['abitazione'];

echo $cap."<br>";
echo $localita."<br>";
echo $indirizzo."<br>";
echo $abitazione."<br>";
try{if ($_GET['gatto'] == true) echo "Il tuo animale preferito è: Gatto<br>";} catch (Exception $e) {echo "";}
try{if ($_GET['cane'] == true) echo "Il tuo animale preferito è: Cane<br>";} catch (Exception $e) {echo "";}
try{if ($_GET['cavallo'] == true) echo "Il tuo animale preferito è: Cavallo<br>";} catch (Exception $e) {echo "";}
try{if ($_GET['mucca'] == true) echo "Il tuo animale preferito è: Mucca<br>";} catch (Exception $e) {echo "";}

