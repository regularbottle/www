<?php
include_once "connection.php";
include_once "libreria.php";
$where = "";
$not_exists = 'false';
$auth = 'false';
if (!isset($order)) {
    $order = 'lastname';
    $direction = 'DESC';
}
if ($_POST) {
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
            } else {
                $auth = true;
            }
        } catch (PDOException $e) {
            die("Errore durante la connessione al database!: " . $e->getMessage());
        }
    }
    if (array_key_exists('email_user_insert', $_POST)) {
        try {
            $sql = "INSERT INTO laravel.users (lastname, firstname, email, password, created_at, updated_at) 
                    VALUES (:lastname, :firstname, :email, :password, NOW(), NOW())";
            if (!empty($connessione)) {
                $st = $connessione->prepare($sql);
            }
            $st->bindParam('lastname', $_POST['lastname_user_isert']);
            $st->bindParam('firstname', $_POST['firstname_user_isert']);
            $st->bindParam('email', $_POST['email_user_insert']);
            $st->bindParam('password', $_POST['password_user']);
            if (!$st->execute()) {
                echo "Errore della query $sql";
            } else {
                echo "Utente inserito correttamente";
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
        if ($auth == 'true') {
            echo "<div class='container mt-3'>";
            echo "<form action='index.php' class='row g-3' role='form' method='POST' enctype='multipart/form-data'>";
            echo "<div class='form-group col-md-4'>";
            echo "<label class='form-label' for='lastname_user_isert'>Cognome</label>";
            echo "<input class='form-control' name='lastname_user_isert' id='lastname_user_isert' required type='text'>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo "<label class='form-label' for='firstname_user_isert'>Nome</label>";
            echo "<input class='form-control' name='firstname_user_isert' id='firstname_user_isert' required type='text'>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo "<label class='form-label' for='email_user_isert'>Email</label>";
            echo "<input class='form-control' name='email_user_insert' id='email_user_insert' required type='text'>";
            echo "</div>";
            echo "<div class='form-group col-md-4'>";
            echo "<label class='form-label' for='password_user_insert'>Password</label>";
            echo "<input class='form-control' name='password_user' id='password_user' required type='password'>";
            echo "</div>";
            echo "<button class='btn btn-primary mt-3' type='submit'>Inserisci</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <h2>Elenco Utenti</h2>
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
            if (array_key_exists('email_user',$_POST)) {
                $records = $records_accesso;
            }
            foreach ($records as $key => $value) {
                if (same_year($value['updated_at']) == 'true') {
                    echo "<tr>
                    <td>" . $value['lastname'] . "</td>
                    <td>" . $value['firstname'] . "</td>
                    <td>" . date_db2user($value['created_at']) . "</td>
                    <td>" . same_year($value['created_at']) . "</td>
                  </tr>";
                } else {
                    echo "<tr>
                    <td><a href='./cambio_password.php?id={$value['id']}'>" . $value['lastname'] . "</a></td>
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
<div class="container mt-3">
    <div class="row g-3">
        <h2>Elenco Utenti più vecchi di 5 anni e meno vecchi di 1 anno</h2>
        <?php
        try {
            $data_cinque_anni = date('Y-m-d H:i:s', strtotime('-5 years'));
            $data_un_anno = date('Y-m-d H:i:s', strtotime('-1 years'));
            $sql = "SELECT * FROM laravel.users WHERE created_at < :cinque_anni AND updated_at > :un_anno ORDER BY $order $direction";
            $st = $connessione->prepare($sql);
            $st->bindParam('cinque_anni', $data_cinque_anni);
            $st->bindParam('un_anno', $data_un_anno);
            $st->execute();
            $records = $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Errore durante la connessione al database!: " . $e->getMessage());
        }
        ?>
        <table class='table col-12'>
            <thead>
            <tr>
                <th scope='col'><a href="index.php?order=lastname&direction=<?php echo $direction; ?>">Firstname</a>
                </th>
                <th scope='col'><a href="index.php?order=firstname&direction=<?php echo $direction; ?>">Lastname</a>
                </th>
                <th scope='col'><a href="index.php?order=created_at&direction=<?php echo $direction; ?>">Data
                        Creazione</a></th>
                <th scope='col'><a href="index.php?order=created_at&direction=<?php echo $direction; ?>">Data
                        Aggiornamento</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($records as $key => $value) {
                echo "<tr>
                    <td>" . $value['lastname'] . "</td>
                    <td>" . $value['firstname'] . "</td>
                    <td>" . date_db2user($value['created_at']) . "</td>
                    <td>" . date_db2user($value['updated_at']) . "</td>
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