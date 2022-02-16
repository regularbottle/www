<?php
class Corso
{
    const FINANZIAMENTO = "Il corso è finanziato con i fondi del Unione Europea";
    private array $voti = []; //elenco dei voti degli studenti: 1 voto per ogni studente iscritto (quindi il numero dei voti coincide con il numero degli studenti)
    private string $nome; //nome corso
    private int $posti; //n. di posti disponibili
    private int $valutazione;  //valutazione assegnata al corso dagli studenti

    function __construct($nome, $posti)
    {
        $this->nome = $nome;
        $this->posti = $posti;
    }

    function setVoto($voto)
    {
        $this->voti[] = $voto;
    }

    function getVoto(): array
    {
        return $this->voti;
    }

    function getPosti(): int
    {
        return $this->posti;
    }

    function getNome(): string
    {
        return $this->nome;
    }

    function getValutazione(): int
    {
        return $this->valutazione;
    }

    function setValutazione($valutazione)
    {
        $this->valutazione = $valutazione;
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
        return count($this->voti) >= $this->posti;
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
$plumbing = new Corso('Plumbing', 223);
$piping = new Corso('Piping', 10);
$pizzaiolo = new Corso('Pizzaiolo', 666);

//1. assegnare i voti random a ogni corso (in numero non superiore al n. di posti)
//quanti voti assegnare a ogni corso? Assegnare un numero random
$corsi = [$ap, $ifts, $plumbing, $piping, $pizzaiolo]; //Un array di oggetti!
try {
    foreach ($corsi as $key => $value) {
        for ($i = 0; $i < random_int(1, $value->getPosti()); $i++) {
            $value->setVoto(random_int(1, 30));
        }
        $value->setValutazione(random_int(1, 30));
    }
} catch (Exception $e) {
    echo "Errore inaspettato";
}
//Lavorare sul vettore $corsi
//2. Elencare i nomi dei corsi
//3. Dopo ogni nome inserire sempre il finanziamento (costante definita nella classe)
foreach ($corsi as $key => $value) {
    echo $value->getNome() . " " . $value::FINANZIAMENTO . "<br>";
}

echo "<hr>";

//4. Qual è il corso con la valutazione maggiore?
$massimo = [];
foreach ($corsi as $key => $value) {
    $massimo[] = [$value->getValutazione() , $value->getNome()];
    echo  $value->getNome() . " : " .  $value->getValutazione() . "<br>";
}
rsort($massimo);
echo "<br>Il corso con la Valutazione maggiore è stato ";
echo $massimo[0][1] . " con un voto di: " . $massimo[0][0] . "<br>";

echo "<hr>";

//5. Qual è la partecipazione media dei corsi?
foreach ($corsi as $key => $value) {
    echo "Con " . $value->getStudenti() . " studenti e " . $value->getPosti()
                . " posti, la percentuale di partecipazione al corso "
                . $value->getNome() . " è stata del: "
                . number_format($value->partecipazione(), 2) . "%" . "<br>";
}