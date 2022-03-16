<?php
include_once "C:\Users\Regular\PhpstormProjects\www\php\connection.php";
$where = "";
if ($_POST) {
    if (array_key_exists('cerca', $_POST)) {
        //cerca i record con $_POST['cerca']
        $where = " WHERE brand LIKE '%{$_POST['cerca']}%' 
                   OR model LIKE '%{$_POST['cerca']}%'  ";
    }

    if (array_key_exists('model', $_POST)) {
        try {
            $sql = "INSERT INTO laravel.cars (model, brand, engine_size) 
                    VALUES (:model, :brand, :engine_size)";
            if (!empty($connessione)) {
                $st = $connessione->prepare($sql);
            }
            $st->bindParam('model', $_POST['model']);
            $st->bindParam('brand', $_POST['brand']);
            $st->bindParam('engine_size', $_POST['engine_size'], PDO::PARAM_INT);
            if (!$st->execute()) {
                echo "Errore della query $sql";
            } else {
                echo "Macchina inserita correttamente";
            }
        } catch (PDOException $e) {
            die("Errore durante la connessione al database!: " . $e->getMessage());
        }
    }
} else if ($_GET && $_GET['order']) {
    $order = $_GET['order'];
}
if (!isset($order)) {
    $order = 'brand';
}
?>
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
    <title>Lezione 10 - 16/03/2022</title>
</head>
<body>
<div class="container mt-3">
    <form action="index.php" class="row g-3" role="form" method="POST" enctype="multipart/form-data">
        <div class="form-group col-md-4">
            <label class="form-label" for="brand">Brand</label>
            <input class="form-control" name="brand" id="brand" required type="text">
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="model">Modello</label>
            <input class="form-control" name="model" id="model" required type="text">
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="engine_size">Engine Size</label>
            <input class="form-control" name="engine_size" id="engine_size" required type="text">
        </div>
        <button class="btn btn-primary mt-3" type="submit">Insert Car</button>
    </form>
</div>
<div class="container mt-3">
    <div class="row g-3">
        <h2>Elenco Macchine</h2>
        <form action="index.php" class="row g-3" method="POST" enctype="multipart/form-data">
            <div class="col-md-8">
                <label for="cerca"></label><input class="form-control" type="text" name="cerca" id="cerca" required>
            </div>
            <div class="col-md-4">
                <input class="btn btn-primary" type="submit" value="Cerca">
            </div>
        </form>
        <?php
        try {
            $sql = "SELECT * FROM laravel.cars $where ORDER BY $order DESC";
            $st = $connessione->prepare($sql);
            $st->execute();
            $records = $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Errore durante la connessione al database!: " . $e->getMessage());
        }
        ?>
        <table class='table col-12'>
            <thead>
            <tr>
                <th scope='col'><a href="index.php?order=brand">Brand</a></th>
                <th scope='col'><a href="index.php?order=model">Model</a></th>
                <th scope='col'><a href="index.php?order=engine_size">Engine Size</a></th>
            </tr>
            </thead>
            <tbody>"
            <?php
            foreach ($records as $key => $value) {
                echo "<tr>
                    <td>" . $value['brand'] . "</td>
                    <td>" . $value['model'] . "</td>
                    <td>" . $value['engine_size'] . "</td>
                  </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script crossorigin="anonymous"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>