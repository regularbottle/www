<?php
include_once 'config.php';
try {

    $connessione = new PDO($dsn, $user, $pass);
}
catch (PDOException $e) {
    die("Errore durante la connessione al database!: " . $e->getMessage());
}