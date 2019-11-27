<?php
    session_start();
    if(!isset($_SESSION['em'])){
        header('Location: index.html');
    }
?>
<?php
		require('konekcija.php');
		if(isset($_POST['pp'])){
		$novipass=$_POST['password'];
		$duzinapass=strlen($novipass);

		$passwordERROR = "";

 		if(empty($novipass) || $novipass == ""){
 				$passwordERROR = "Polje ne moze biti prazno!";
 				echo "<script>
					alert('Greska: $passwordERROR');
					window.location.assign('podesavanja.php');
					</script>";}
 					
 		if($duzinapass<8){
 			$passwordERROR="Password mora imati minimalno 8 karaktera!";
 			echo "<script>alert('Greska: $passwordERROR');
 				window.location.assign('podesavanja.php');
 				</script>";
 		}

		if(empty($passwordERROR)){
			$sql="UPDATE korisnici SET Password = '$novipass' WHERE Email='".$_SESSION['em']."'";
			$rezultat=mysqli_query($konekcija,$sql);
		if($rezultat){
			echo "<script>alert('Uspesno ste azurirali Vas password!');
				window.location.assign('podesavanja.php');
				</script>";
		}
		else{
			echo "<script>alert('Nije uspelo azuriranje!')";
}
}
}

?>