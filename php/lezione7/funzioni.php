<?php
include '../libreria.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet">

    <title>Funzioni</title>
</head>
<body>
<h1 class="display-1 text-center text-decoration-underline">Funzioni</h1>
<div class="text-center fs-2">
    <?php
    $data = date('Y-m-d');
    echo day(date('w')) . " " . from_date($data, "day") . "<br>";
    echo month(from_date($data, "month")) . "<br>";
    echo from_date($data, "year") . "<br>";
    echo date_db2user($data);
    ?>
</div>
<p id="current-Time" class="text-center fs-2" onLoad="showTime"></p>
<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="current-time.js"></script>
</body>
</html>