<?php

class Esempio
{
    public $testo = "Un testo di esempio";
    public $numero1;
    public $numero2;

    function __construct($testo)
    {
        $this->testo = $testo;
    }
}

echo "La mia prima classe." . "<br>";
$oggetto = new Esempio('hello world 1');
echo $oggetto->testo . "<br>";

$oggetto->numero1 = date('m');
$oggetto->numero2 = date('z');

//echo $oggetto->numero1 + $oggetto->numero2 . "<br>";

$pincoPallo = new Esempio('hello world 2');

$pincoPallo->numero1 = date('Y');
$pincoPallo->numero2 = date('h');

echo $pincoPallo->numero1 * $pincoPallo->numero2 . "<br>";

echo date('Y-m-d') . "<br>";

var_dump($oggetto);
var_dump($pincoPallo);

