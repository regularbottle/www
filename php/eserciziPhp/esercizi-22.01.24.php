<?php
/*Esercizio 1
Dati 3 array con valori non noti a priori ma con la struttura simile a quelli forniti nel seguito, svolgere le
seguenti operazioni.
$studente1 = array (‘cognome’=>”Rossi”, ‘nome’=>”Mario”, ‘corso’=>”IFTS”, ‘voto’=>”10”);
$studente2 = array (‘cognome’=>”Verdi”, ‘nome’=>”Giovanni”, ‘corso’=>”IFTS”, ‘voto’=>”8”);
$studenti = array ($studente1, $studente2);
1. Inserire un nuovo studente con dati a scelta
2. Ripetere il punto 1 per 100 volte
3. Visualizzare i dati degli studenti del corso IFTS, in forma tabellare.
4. Visualizzare i dati degli studenti promossi (con voto sufficiente) di qualsiasi corso.
5. Nell’elenco del punto precedente aggiungere un link sul nome del corso.

function corso(int $corso): string
{
    switch($corso) {
        case 1: return "<a href='https://www.enaiprimini.org/2020/10/07/formazione-tecnico-superiore-ifts-anno-2020-2021/'>IFTS</a>";
        case 2: return "<a href='https://www.enaiprimini.org/'>ENAIP</a>";
        case 3: return "<a href='https://www.enaiprimini.org/2022/01/26/iscrizione-corsi-iefp-anno-2022/'>Meccanica</a>";
        case 4: return "<a href='https://www.enaiprimini.org/2021/12/22/percorsi-per-il-lavoro-2/'>Saldatura</a>";
        default: return "";
    }
}

$studenti['studente1'] = ['cognome' => "Rossi", 'nome'=>"Mario", 'corso'=>"IFTS", 'voto'=>"10"];
$studenti['studente2'] = ['cognome' => "Verdi", 'nome'=>"Giovanni", 'corso'=>"IFTS", 'voto'=>"8"];

for ($i = 3; $i<97; $i++) {
    try {
        $studenti['studente' . $i] = ['cognome' => "Bianchi", 'nome' => "Vittorio", 'corso' => corso(random_int(1, 4)), 'voto' => random_int(2, 10)];
    } catch (Exception $e) {
    }
}
$indice_corso = 0;
$indice_voto = 0;
echo "<table style='border: 1px solid black'>
        <caption><h3>La tabella Nutrizionale</h3></caption>
        <thead>
        <tr>
            <th>Cognome</th>
            <th>Nome</th>
            <th>Corso</th>
            <th>Voto</th>
        </tr>
        </thead>
        <tbody>";
foreach ($studenti as $v1) {
    echo "<tr>";
    foreach ($v1 as $v2) {
        if ($indice_voto==3 && $v2>=6) {
            echo "<td style='border: 1px solid black; background-color: salmon'> $v2</td>";
        } else {
        echo "<td style='border: 1px solid black'>$v2 </td>";
        }
        $indice_corso++;
        $indice_voto++;
        }
    $indice_corso = 0;
    $indice_voto = 0;
    echo "</tr>";
    }
echo "</tbody></table>";


Esercizio 2
Creare un file php in cui siano definiti 3 array come quelli riportati sotto
(considerarli solo come esempio ed effettuare i calcoli come se non si conoscessero i valori memorizzati),
poi svolgere le operazioni richieste
$corso1 = array (‘nome’=>”IFTS”, ‘inizio’=>”2021-09-30”,’coordinatore’=>”Forlivesi”, ‘n_partecipanti’=>”20”);
$corso2 = array (‘nome’=>”Analista Programmatore”, ‘inizio’=>”2022-02-01”,’coordinatore’=>”Rossi”,
‘n_partecipanti’=>”12”);
$corsi = array($corso1, $corso2);
6. Elencare tutti i nomi dei corsi e le rispettive date di inizio.
7. Per i corsi che devono ancora iniziare, nell’elenco del punto 1 inserire un link alla pagina di iscrizione
“./iscrizione.php”.
8. Esiste almeno un corso coordinato da “Rossi”? Se sì, in quale data inizia il corso più vecchio? In
    quale anno?
9. Qual è il corso con il maggior numero di partecipanti? In caso di parità, elencare tutti i corsi
selezionati.
10. Qual è il prossimo corso in partenza?
    N.B. Utilizzare almeno una funzione a vostra scelta e rappresentare le date nel formato dd/mm/aaaa */

$corsi['corso1'] = ['nome' => "IFTS", 'inizio'=>"2021/09/30", 'coordinatore'=>"Forlivesi", 'n_partecipanti'=>"20"];
$corsi['corso2'] = ['nome' => "Analista Programmatore", 'inizio'=>"2022/02/01", 'coordinatore'=>"Rossi", 'n_partecipanti'=>"12"];
$corsi['corso3'] = ['nome' => "Tecnico Programmatore", 'inizio'=>"2022/01/03", 'coordinatore'=>"Rossi", 'n_partecipanti'=>"12"];
$corsi['corso4'] = ['nome' => "Sistemista", 'inizio'=>"2022/02/01", 'coordinatore'=>"Prandini", 'n_partecipanti'=>"11"];

$ricerca_coordinatore = "Rossi";
$ricerca_coordinatore_bool = false;

foreach ($corsi as $stampa => $array_corsi) {
    if (date("Y/m/d") < $array_corsi['inizio']) {
        echo "Nome Corso: ".$array_corsi['nome']." | Data Inizio: ".$array_corsi['inizio']." | <a href='./iscrizione.php'>Link al corso</a><br>";
    } else {
    echo "Nome Corso: ".$array_corsi['nome']." | Data Inizio: ".$array_corsi['inizio']."<br>";
    }
    if ($array_corsi['coordinatore'] == $ricerca_coordinatore) {
        $ricerca_coordinatore_bool = true;
        $ricerca_data[] = $array_corsi['inizio'];
    }
    $ricerca_partecipanti[] = $array_corsi['n_partecipanti'];
}

if ($ricerca_coordinatore_bool == true) {
    sort($ricerca_data);
    echo "Rossi è coordinatore di un corso e il corso più vecchio inizia il: ".$ricerca_data[0]."<br>";
}

$max = 0;
sort($ricerca_partecipanti);

$n_partecipanti_max = $ricerca_partecipanti[count($ricerca_partecipanti) - 1];
foreach ($corsi as $stampa => $array_corsi) {
    if ($array_corsi['n_partecipanti'] == $n_partecipanti_max) {
        echo $array_corsi['nome']." con ".$array_corsi['n_partecipanti']." partecipanti<br>";
    }
}


