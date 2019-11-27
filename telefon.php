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
<div>
</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<center>
		<div class="pretraga">
	<form method="POST" action="pretraziti.php">
		<p style="color:white; padding: 10px;">Pretražite mobilni uređaj: </p>
			<input style="font-style: italic;"type="text" name="search" placeholder="Polje za unos">
			<input type="submit" name="pretraziti" value="Pretraži">
		</form>
		</div>
	</center>

<?php
	require('konekcija.php');
	$sql="SELECT dobavljac.Ime, serijski_broj.Broj, telefon.Naziv, telefon.Cena 
		FROM serijski_broj INNER JOIN telefon ON serijski_broj.Sifra=telefon.SifraSerijski 
		INNER JOIN dobavljac ON telefon.SifraDobavljac=dobavljac.Sifra
		ORDER BY dobavljac.Ime";
	$rezultat=mysqli_query($konekcija,$sql);
	echo "<table border='1' style='width:100%;font-size:15px;font-weight:bold;'>";
	echo "<thead><tr style='background-color:black; color:white;'><th style='text-align:left'>Shopping Websites</th><th style='text-align:left'>Naziv telefona</th><th style='text-align:right'>Serijski broj</th><th style='text-align:right'>Cena (rsd)</th></thead><tbody style='background-color:black; color:white; opacity: .9;'>";

while($podatak=mysqli_fetch_array($rezultat)){
	$dobavljac=$podatak['Ime'];
	$naziv=$podatak['Naziv'];
	$serijski_broj=$podatak['Broj'];
	$cena=$podatak['Cena'];
	echo "<tr></td><td style='padding:3px 2px 3px 7px'>$dobavljac</td><td style='padding:3px 2px 3px 7px'>$naziv</td><td style='text-align:right'>$serijski_broj</td><td style='text-align:right'>$cena</td>";
}

?>
</body>
</html>
