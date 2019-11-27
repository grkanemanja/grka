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
<br>
<br>
<br>
<br>
<br>
<br>
<?php
		require('konekcija.php');
		$sql= "SELECT * FROM telefon";
		$rezultat=mysqli_query($konekcija,$sql);
 ?>	
 	<div class="kupovina">
 	<center>
	<form action="kupiti.php" method="POST" >
		<p>Izaberite telefon :</p>

		<select name="izaberi">

<?php
		while($telefon=mysqli_fetch_array($rezultat)){
			echo "<option> ".$telefon['Naziv']." </option>";
		} 
?>
	</select>

	<br>
	<input style="margin-left:115px;margin-top:10px;float:left;" type="submit" name="kupiti" value="Kupi">
	</form>
	<br>
			
<form method="POST" action="brisanje.php" >
	<input style="margin-top:-25px;margin-right:90px;float:right;" type="submit" name="obrisi" value="Obrišite vašu kupovinu">
</form>
</center>
</div>
<style>
	.kupovina{
    padding: 1px;
    color: white;
    margin-left:33%;
    width: 35%;
    height: 18%;
    box-sizing: border-box;
    border-radius:20px 20px 20px 20px;
    background-color: black;
    opacity: .9;
}

.kupovina input[type="submit"]{
    border: none;
    outline: none;
    background: #fb2525;
    color: #fff;
    font-size: 15px;
    border-radius: 3px;
}

.kupovina input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
</style>
</body>
</html>
