<?php

class Corso
{
    const FINANZIAMENTO = "Il corso è finanziato con i fondi dell'Unione Europea";
    private
        $voti = [], //elenco dei voti degli studenti: 1 voto per ogni studente iscritto (quindi il numero dei voti coincide con il numero degli studenti)
        $nome, //nome corso
        $posti, //n. di posti disponibili
        $valutazione;  //valutazione assegnata al corso dagli studenti


    function __construct($nome, $posti)
    {
        $this->nome = $nome;
        $this->posti = $posti;
    }

    function setVoto($voto)
    {
        $this->voti[] = $voto;
    }

    function getVoto()
    {
        return $this->voti;
    }

    function getPosti()
    {
        return $this->posti;
    }

    function getNome()
    {
        return $this->nome;
    }

    function setValutazione($valutazione)
    {
        $this->valutazione = $valutazione;
    }

    function getValutazione()
    {
        return $this->valutazione;
    }

    function getStudenti(): int
    {
        return count($this->voti);
    }

    /**
     * @return true Se il n. degli studenti è uguale (o maggiore) al n. di posti disponibili, false altrimenti
     */
    function completo(): bool
    {
        return count($this->voti) == $this->posti;
    }

    /**
     * @return float|int % di partecipazione (= n. studenti/posti * 100)
     */
    function partecipazione(): float|int
    {
        return (count($this->voti) * 100) / ($this->posti);
    }
}

$ap = new Corso('Analista Programmatore', 12);
$ifts = new Corso('IFTS', 20);

//1. assegnare i voti random a ogni corso (in numero non superiore al n. di posti)
//quanti voti assegnare a ogni corso? Assegnare un numero random

try {
    for ($i = 0; $i < random_int(1, $ap->getPosti()); $i++) {
        $ap->setVoto(random_int(1, 30));
    }
    $ap->setValutazione(random_int(1, 30));
    for ($i = 0; $i < random_int(1, $ifts->getPosti()); $i++) {
        $ifts->setVoto(random_int(1, 30));
    }

    $ifts->setValutazione(random_int(1, 30));
} catch (Exception $e) {
}

$corsi = [$ap, $ifts]; //un array di oggetti!

//Lavorare sul vettore $corsi
//2. elencare i nomi dei corsi
//3. dopo ogni nome inserire sempre il finanziamento (costante definita nella classe)
foreach ($corsi as $key => $value) {
    echo $value->getNome() . " " . $value::FINANZIAMENTO . "<br>";
}
//4. qual è il corso con la valutazione maggiore?
if ($corsi[0]->getValutazione() > $corsi[1]->getValutazione()) {
    echo "Il corso con la Valutazione maggiore è stato: " . $corsi[0]->getNome() . " con un voto di: " . $corsi[0]->getValutazione() . "<br>";
} else {
    echo "Il corso con la Valutazione maggiore è stato: " . $corsi[1]->getNome() . " con un voto di: " . $corsi[1]->getValutazione() . "<br>";
}
//5. qual è la partecipazione media dei corsi?
foreach ($corsi as $key => $value) {
    echo "Con " . $value->getStudenti() . " studenti e " . $value->getPosti() . " posti, la percentuale di partecipazione e' stata del: " . number_format($value->partecipazione(), 2) . "%" . "<br>";
}

