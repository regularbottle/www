<!DOCTYPE html>
<html lang="it">

<body>
  <?php
  $limite = random_int(1, 100);
  $numeri = range(1, 1000);
  shuffle($numeri);
  $numeri = array_slice($numeri, 0, $limite + 1);

  var_dump($numeri);

  $ppiccolo = $numeri['0'];
  for ($i = 0; $i < $limite; ++$i) {
      if ($ppiccolo > $numeri[$i + 1]) {
          $ppiccolo = $numeri[$i + 1];
      }
  }
  echo "<br>Il numero piu' piccolo e' ", $ppiccolo;
  ?>
</body>
</html>