<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>

<?php
    error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
?>

<html>
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<p> 
<div class="naslov1">
	<h1 class="naslov">Mobile Shop "Grković"</h1>
</div>
<div>
	<ul>
		<li><a href="pocetna.php">Početna strana</a></li>
		<li><a href="telefon.php">Telefoni</a></li>
		<li><a href="sliketelefona.php">Galerija telefona</a></li>
		<li><a href="kupovina.php">Kupovina</a></li>
<li style="float:right; position: absolute;" class="drop"><a href="korisnik.php"><?php echo $_SESSION['em'] ?></a>
<ul class="dropsadrzaj">
		<li><a href="podesavanja.php">Podešavanja</a></li>
		<li><a href="odjavise.php">Odjavi se</a></li>

</ul>
</li>
	</ul>
</div>
<br>
<br>

<?php
	require('konekcija.php');
	$sql="SELECT * FROM korisnici WHERE Email='".$_SESSION['em']."'";
	$rezultat=mysqli_query($konekcija,$sql);
	$podaci=mysqli_fetch_array($rezultat);
	$password=$podaci['Password'];
	echo "<br><br><br>
	<div style='color:white;'>
	<ol>Vaši password je:
	<br>
	<br>
		<li>Password: $password</li>
	</ol>
	</div>
	";
?>
<br>
<br>
	<div class="pass">
	<form method="POST" action="azuriranje.php">
	<input style=" margin-left:40px;color:white;"type="password" name="password" placeholder="Unesite nov password"><br><br>
	<input  type="submit" name="pp" value="Promeni password"></input>
</form>
</div>
<style>
	.pass input[type="submit"], input[type="password"]{
	margin-left:40px ;
	position:relative;
    border: none;
    outline: none;
    height: 4%;
    background: #fb2525;
    color: white;
    font-size: 15px;
    border-radius: 15px;
    padding: 5px;
}
	.pass input[type="submit"]:hover {
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
</style>
</body>
</html>