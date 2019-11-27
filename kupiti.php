	<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>

<?php 
	require('konekcija.php');
	if(isset($_POST['kupiti'])){
		$korisnik=$_SESSION['em'];
		$telefon=$_POST['izaberi'];
		$sifra="SELECT Sifra FROM telefon WHERE Naziv='$telefon'";
		$rezultat=mysqli_query($konekcija,$sifra);
		$rezultat1;
		while($podatak=mysqli_fetch_array($rezultat)){
				$rezultat1=$podatak['Sifra'];
		}
			

		$sql="INSERT INTO kupovina (Korisnik,SifraTelefon) VALUES('".$korisnik."','".$rezultat1."')" ;
		$rezultat2=mysqli_query($konekcija,$sql);
		if($rezultat2){
			echo "<script>
				alert('Uspesna kupovina!');
				window.location.assign('kupovina.php');
				</script>";
		}
		else{
			mysqli_error($konekcija);
		}
	}else{ 
		echo "<script>alert('Nema konekcije sa bazom!')</script>";
	}
?>