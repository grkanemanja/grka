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
</body>
</html>


<?php
		require('konekcija.php');
		if(isset($_POST['pretraziti'])){
			$pretraziti=$_POST['search'];
			$sql="SELECT telefon.Naziv,telefon.Cena FROM telefon WHERE telefon.Naziv LIKE'%$pretraziti%'"; 
			$rezultat=mysqli_query($konekcija,$sql);	
			echo "<table border='1' style='width:100%;font-size:15px;font-weight:bold; margin-top:10%'>";
			echo "<thead><tr style='background-color:black; color: white;'><th>Naziv telefona</th><th>Cena (rsd)</th></thead><tbody style='background-color: black; opacity: .9; color: white;'>";
		if(mysqli_num_rows($rezultat)>0){
		while($podatak=mysqli_fetch_array($rezultat)){
			$naziv=$podatak['Naziv'];
			$cena=$podatak['Cena'];
			echo "<tr><td>$naziv</td><td style='text-align:center'>$cena</td>";}
		}
		else {
			echo "<p style='text-align: center; color:white; bottom:60%'>Nema rezultata</p>";
}
}
?>