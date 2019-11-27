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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<input style="color:white; "type="file" name="slika" enctype="multipart/form-data">
			<button type="submit" name="upload">Dodajte fotografiju telefona</button>
		</form>
</center>
	<?php 
		require('konekcija.php');
		$sql="SELECT * FROM sliketelefona";
		$rezultat=mysqli_query($konekcija,$sql);
		while($podaci=mysqli_fetch_array($rezultat)){
			echo "<img src='".$podaci['Path']."'>";
}
?>
</body>
</html>