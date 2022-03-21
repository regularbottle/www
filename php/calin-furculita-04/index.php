<?php
include_once "connection.php";
include_once "libreria.php";
$where = "";
$not_exists = 'false';
if (!isset($order)) {
    $order = 'lastname';
    $direction = 'DESC';
}
if ($_POST) {
//PREPARE FOR CERCA
    //CONTROLLO UTENTE
    if (array_key_exists('email_user', $_POST)) {
        try {
            $sql = "SELECT * FROM laravel.users WHERE email LIKE :email AND password LIKE :password ORDER BY $order $direction";
            $st = $connessione->prepare($sql);
            $st->bindParam('email', $_POST['email_user']);
            $st->bindParam('password', $_POST['password_user']);
            $st->execute();
            $records_accesso = $st->fetchAll(PDO::FETCH_ASSOC);
            if (!count($records_accesso)) {
                $not_exists = true;
            }
        } catch (PDOException $e) {
            die("Errore durante la connessione al database!: " . $e->getMessage());
        }
    }
//ORDER BY
} else if ($_GET && $_GET['order']) {
    $order = $_GET['order'];
    $direction = (($_GET['direction'] ?? 'ASC') == 'ASC') ? 'DESC' : 'ASC';
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
    <title>Verifica - 21/03/2022</title>
</head>
<body>
<div class="container mt-3">
    <form action="index.php" class="row g-3" role="form" method="POST" enctype="multipart/form-data">
        <div class="form-group col-md-4">
            <label class="form-label" for="email_user">Email</label>
            <input class="form-control" name="email_user" id="email_user" required type="text">
        </div>
        <div class="form-group col-md-4">
            <label class="form-label" for="password_user">Password</label>
            <input class="form-control" name="password_user" id="password_user" required type="password">
        </div>
        <button class="btn btn-primary mt-3" type="submit">Accedi</button>
    </form>
</div>
<div class="container mt-3">
    <div class="row g-3">
        <h2>Elenco Utenti</h2>
        <?php
        try {
            if ($where == "") {
                //STAMPA NORMALE
                $sql = "SELECT * FROM laravel.users ORDER BY $order $direction";
                $st = $connessione->prepare($sql);
            } else {
                //CERCA
                $sql = "SELECT * FROM laravel.users WHERE lastname LIKE :cerca OR firstname LIKE :cerca ORDER BY $order $direction";
                $cerca = "%" . $_POST['cerca'] . "%";
                $st = $connessione->prepare($sql);
                $st->bindParam('cerca', $cerca);
            }
            $st->execute();
            $records = $st->fetchAll(PDO::FETCH_ASSOC);
            $numero_utenti = count($records);
        } catch (PDOException $e) {
            die("Errore durante la connessione al database!: " . $e->getMessage());
        }
        ?>
        <table class='table col-12'>
            <?php
            echo "<h3> Il numero di persone nel database sono: " . $numero_utenti . "<br>";
            if ($not_exists == 'true') {
                echo "L'Email o la password inseriti non sono validi <br></h3>";
            }
            ?>
            <thead>
            <tr>
                <th scope='col'><a href="index.php?order=lastname&direction=<?php echo $direction; ?>">Firstname</a>
                </th>
                <th scope='col'><a href="index.php?order=firstname&direction=<?php echo $direction; ?>">Lastname</a>
                </th>
                <th scope='col'><a href="index.php?order=created_at&direction=<?php echo $direction; ?>">Data
                        Creazione</a></th>
                <th scope='col'>Created anno corrente?</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($_POST) {
                $records = $records_accesso;
            }
            foreach ($records as $key => $value) {
                if (same_year($value['updated_at']) == true) {
                    echo "<tr>
                    <td>" . $value['lastname'] . "</td>
                    <td>" . $value['firstname'] . "</td>
                    <td>" . date_db2user($value['created_at']) . "</td>
                    <td>" . same_year($value['created_at']) . "</td>
                  </tr>";
                } else {
                    echo "<tr>
                    <td><a href='./cambio_password.php?id={$value['id']}'" . $value['lastname'] . "</td>
                    <td>" . $value['firstname'] . "</td>
                    <td>" . date_db2user($value['created_at']) . "</td>
                    <td>" . same_year($value['created_at']) . "</td>
                  </tr>";
                }
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