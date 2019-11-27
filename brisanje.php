<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>
<?php
require('konekcija.php');
if(isset($_POST['obrisi'])){
	$sql="DELETE FROM kupovina WHERE kupovina.Korisnik ='".$_SESSION['em']."'";
	$rezul=mysqli_query($konekcija,$sql);
	if($rezul){
		echo "<script>alert('Uspesno ste obrisali!');
			window.location.assign('kupovina.php');
			</script>";
	}
	else{
		mysqli_error($konekcija);
		echo "<script>alert('Neuspesno brisanje!')</script>";
	}
}

?>