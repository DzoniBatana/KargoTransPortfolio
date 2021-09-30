

<?php

$servername = "169.254.0.2:3306";
$username = "nikolari_php_connection";
$pass = "O2!HSJv6Nk*N";
$dbname = "nikolari_php_connection";

$link = mysqli_connect($servername,$username,$pass,$dbname);
if($link)
{
    echo "<script>alert('Uspeno ste se konektovali na bazu podataka, pozdrav!');</script>";
}

else
{
echo "<script>alert('Niste se konektovali na bazu podataka. Mnogo nam je zao!');</script>";
}

?>

