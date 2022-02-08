<!DOCTYPE html>
<html lang="it">
<body>
<?php
$connection = mysqli_connect('localhost', 'root', '', 'csv_db') or exit('Error ' . mysqli_error($connection));
$sql = 'select * from nazioni';
$result = mysqli_query($connection, $sql) or exit('Error ' . mysqli_error($connection));
?>
<?php
while ($row = mysqli_fetch_array($result)) { ?>
    <option value="<?php echo $row['Nazione']; ?>">
        <?php echo $row['Nazione']; ?></option> <?php } ?>
<?php mysqli_close($connection); ?>
</body>
</html>