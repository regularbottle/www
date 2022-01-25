<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foreach</title>
</head>
<body>
<?php
$festeggiato = ['nome'=>"Ruslan", 'cognome'=>"Andrusenko",'anno'=>2000];
echo "$festeggiato[cognome] <br>";
$festeggiato2['persona1'] = ['nome' => "Ruslan", 'cognome'=>'Andrusenko','anno'=>2000];
$festeggiato2['persona2'] = ['nome' => "Calin", 'cognome'=>'Furculita','anno'=>1993];

echo $festeggiato2['persona2']['cognome']."<br>";
//$festeggiato['nome'] .= " Rossi";
//echo $festeggiato['nome'];
//$festeggiato[]= "Nuovo";
//print_r($festeggiato);
foreach($festeggiato as $chiave => $valore){
    //echo $festeggiato[$chiave];
    echo "$chiave = $valore <br>";
}
echo "<hr>";
//temperatura medi dei mesi memorizati
$temperature=['gennaio'=> -1, 'febbraio'=>5,'marzo'=>15];
$somma = 0;
$i=0;
//echo $temperature['marzo'];
foreach($temperature as $c => $v){
    $i++;
    if($i==2 OR $i==6){
        echo "sto analizzando il 2° o il 6°<br>";
    }
    if($v>= 0){
        echo "$c = $v <br>";
    }
    $somma = $somma + $v;
}
//media
echo "media = ".($somma / count($temperature) );
echo"<hr>";
//creare un array con 12 valori di temperature rand con chiave il nome del mese
//$temperature =['1'=>'random','2'=>-2];
$mesi = [];
//$array = ['t'=>-10,'giorni'=>31];

$mesi['gennaio'] = ['t'=>-10,'giorni'=>31];
$mesi['febbraio'] = ['t'=>2,'giorni'=>28];
$mesi['marzo'] = ['t'=>8,'giorni'=>31];
$mesi['aprile'] = ['t'=>8,'giorni'=>31, 'umidità' =>40];


//inizializzazione dell'array
for($m=1; $m<=12; $m++){
    switch($m){
        case 1: $nomemese_m = "gennaio"; $numero_giorni_m = 31; break;
        case 2: $nomemese_m = "febbraio"; $numero_giorni_m = 28; break;
        case 3: $nomemese_m = "marzo"; $numero_giorni_m = 31; break;
        case 4: $nomemese_m = "aprile"; $numero_giorni_m = 30; break;
        case 5: $nomemese_m = "maggio"; $numero_giorni_m = 31; break;
        case 6: $nomemese_m = "giugno"; $numero_giorni_m = 30; break;
        case 7: $nomemese_m = "luglio"; $numero_giorni_m = 31; break;
        case 8: $nomemese_m = "agosto"; $numero_giorni_m = 31; break;
    }    
    
    //$mesi[$nomemese_m] = ['t'=> rand(-5,30) ,'giorni'=> $numero_giorni_m ];
    
    $mesi[$nomemese_m]['t'] = rand(-5,30);
    $mesi[$nomemese_m]['giorni']= $numero_giorni_m;

    //rand(-5,30);
}
//print_r($mesi);
//var_dump($mesi);

foreach($mesi as $mese => $array_mese){
    echo "$mese (".$array_mese['giorni']." giorni): ".$array_mese['t']."<br>" ;
    //echo "T. media del mese $mese = $mesi<br>";
}
echo "<hr>";
//elenco degli studenti
$s1=['nome'=>"Mario",'voto'=>30];
$s2=['nome'=>"Giovanni",'voto'=>20];
$studenti =[$s1,$s2];
?>
<table border=0>
    <tr>
        <th>Nome</th>
        <th>Voto</th>
    </tr>
    <?php
    for($i=0;$i<count($studenti);$i++){
        $studente = $studenti[$i];
        $voto = $studente ['voto'];
        echo "<tr>
            <td>
            {$studente['nome']}
            </td>
            <td>{$voto}</td>
        </tr>";
    }
    ?>
</table>

<?



?>
</body>
</html>