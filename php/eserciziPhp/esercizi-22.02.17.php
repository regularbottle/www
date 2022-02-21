<?php
include '../libreria.php';

function giorni_totali($array, $chiave)
{
    $totale_giorni = 0;
    foreach ($array as $key => $value) {
        $totale_giorni += $value[$chiave];
    }
    return $totale_giorni;
}

/*Premessa
Un hotel vuole gestire sul suo sito internet i commenti dei clienti che soggiornano in
hotel: il progetto prevede che il navigatore possa visualizzare tutti i messaggi già presenti
e inserirne uno nuovo.
Esercizio PHP
Creare un form in cui il navigatore possa inserire i dati relativi ad un nuovo commento
sul soggiorno in hotel: nome, data di inizio del soggiorno, n. di giorni, tipologia di
vacanza (business o privata), n. di persone e il testo del commento.
Nella pagina successiva sono definiti alcuni array contenenti i dettagli di ogni commento
e un array contenente tutti gli array dei singoli commenti, tipo quelli definiti sotto, i cui
valori sono da considerare non statici, cioè non noti a priori.
$commento1 = [‘nome’=>”Mario Rossi”, ‘data’=>”2022-01-10”, ‘giorni’ => 4, ecc. ];
$commento2 = [‘nome’=>”Giovanni Verdi”, ‘data’=>”2021-12-30”, ‘giorni’ => 2, ecc. ];
$commenti = [$commento1, $commento2];

1. Riepilogare i dati inseriti nel form.*/
foreach ($_POST as $key => $value) {
    echo "$key: $value <br>";
}

/*2. Creare un nuovo array con i dati inseriti nel form secondo lo schema utilizzato
nell’array $commento1 e $commento2, poi aggiungerlo all’array $commenti*/
$commento1 = ['nome' => "Mario Rossi", 'data' => "2022-01-10", 'giorni' => 4, 'tipologia' => "privata"];
$commento2 = ['nome' => "Giovanni Verdi", 'data' => "2021-12-30", 'giorni' => 2, 'tipologia' => $_POST['tipologia']];
$commenti = [$commento1, $commento2, $_POST];
echo "<hr>";
/*3. Elencare tutti i nomi delle persone che hanno inserito un commento e la rispettiva
data di soggiorno (nel formato gg/mm/aaaa)*/
$anno = date("Y") - 1;
foreach ($commenti as $key) {
    echo $key['nome'] . " in data " . date_db2user($key['data']) . "<a href=\./esercizi-22.02.17-dettaglio.php?nome=" . $key['nome'] . "> Dettagli </a><br>";
}
echo "<hr>";
/*4. Elencare le tipologie di vacanza specificando quanti commenti sono presenti per
ogni tipologia (es. business -> 2 commenti).
Non elencare le tipologie senza commenti.*/
$no_tipologie = ['bussiness' => 0, 'privata' => 0, 'suite' => 0];
foreach ($commenti as $key => $value) {
    $no_tipologie[$value['tipologia']]++;
}
foreach ($no_tipologie as $key => $value) {
    if ($value) echo "$key -> $value <br>";
}
echo "<hr>";
/*5. Nell’elenco del punto 3, vicino a ogni nome, inserire un link alla pagina di
dettaglio “./dettaglio.php”, trasmettendo a questa pagina il nome della persona.


6. Sommare tutti i n. di giorni dei vari commenti all’interno di $commenti;
generalizzare il codice appena scritto all’interno di una funzione con 2 argomenti
in ingresso: un array bidimensionale e una stringa che corrisponde alla chiave di
cui restituire i valori sommati function somma_elementi ($a, $chiave)*/

echo "Giorni Totali: " . giorni_totali($commenti, 'giorni');