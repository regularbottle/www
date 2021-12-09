<!DOCTYPE html>
<html lang="it">
    <body> 
        <?php
            $name = $_GET['name'];
            $surname = $_GET['surname'];
            $nation = $_GET['nation'];
            $province = $_GET['province'];
            $dateofbirth = $_GET['dateofbirth'];
            $gender = $_GET['gender'];

            $connection = mysqli_connect('localhost', 'root', '', 'csv_db') or exit('Error '.mysqli_error($connection));
            $sqlNat = 'select CodFisco from nazioni where Nazione = \''.$nation.'\'';
            $resultNat = mysqli_query($connection, $sqlNat) or exit('Error '.mysqli_error($connection));
            $codFiscoNat = mysqli_fetch_array($resultNat);
            $sqlCom = 'select CodFisco from comuni where Comune = \''.$province.'\'';
            $resultCom = mysqli_query($connection, $sqlCom) or exit('Error '.mysqli_error($connection));
            $codFiscoCom = mysqli_fetch_array($resultCom);
            mysqli_close($connection);

            echo 'Nome: ', $name, '<br>',
                 'Cognome: ', $surname, '<br>',
                 'Luogo di nascità: ', $nation, ' Codice Fisco: ', $codFiscoNat['0'],'<br>',
                 'Comune: ', $province, ' Codice Fisco: ', $codFiscoCom['0'], '<br>',
                 'Data di nascita: ', $dateofbirth, '<br>',
                 'Sesso: ', $gender;
        ?>
    </body>
</html>