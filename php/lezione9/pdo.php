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
            "Indirizzo: " . $value['address'];
    }
    ?>
</div>
<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>