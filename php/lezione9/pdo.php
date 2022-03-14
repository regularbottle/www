<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet">
    <title>PDO - 09/03/2022</title>
</head>
<body>
<div class="container mt-3">
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "laravel";

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    try {
        $connessione = new PDO($dsn, $user, $pass);
        $st = $connessione->prepare("SELECT * FROM laravel.hotels");
        $st->execute();
        $records = $st->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Errore durante la connessione al database!: " . $e->getMessage());
    }
    foreach ($records as $key => $value) {
        echo "Nome Hotel: " . $value['name'] . "<br>" .
            "Valutazione: " . $value['stars'] . "\u{2B50}" . "<br>" .
            "Indirizzo: " . $value['address'] . "<hr>" ;
    }

    try {
        $nome = 'Holiday Inn';
        $sql = "INSERT INTO laravel.hotels (name, stars, address, created_at, updated_at) VALUES ('Holiday Inn', 3, 'Via Roma 155', 'date(\"Y-m-d H:i:s\")', 'date(\"Y-m-d H:i:s\")')";
        //2 PREPARE
        $st = $connessione->prepare($sql);
        //3 BIND
        $st->bindParam('name', $name);
        $st->bindParam('stars', $stars);
        $st->bindParam('address', $address);
        $st->bindParam('created_at', $created_at);
        $st->bindParam('updated_at', $updated_at);
        //4 EXECUTE
        $st->execute();
    } catch (PDOException $e) {
        die("Errore durante la connessione al database!: " . $e->getMessage());
    }
    ?>
</div>
<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>