<?php
$host = "localhost";
$server_username = "root";
$server_pass = "";
$base = "grkovic";
$konekcija = mysqli_connect($host,$server_username, $server_pass,$base);

if (!$konekcija) {
    die("Neuspesno konektovani: " . mysqli_connect_error());
}

?>