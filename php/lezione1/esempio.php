<!DOCTYPE html>
<html lang="it">

<body>
  <?php
  echo 'Prima pagina<br>';
  echo 'Oggi è il ', date('Y/m/d');
  echo '<br>';
  $data = date('H:i:s');
  echo 'Daniele dice: "Pausa" alle ', $data, '!<br>';

  $numeri = range(1, 1000);
  shuffle($numeri);
  $numeri = array_slice($numeri, 0, 10);
  
  var_dump($numeri);

  $ppiuccolo = $numeri['0'];
  for ($i = 0; $i < 9; ++$i) {
      if ($ppiuccolo > $numeri[$i + 1]) {
          $ppiuccolo = $numeri[$i + 1];
      }
  }
  echo "<br>Il numero piu' piccolo e' ", $ppiuccolo;
  ?>
</body>
</html>