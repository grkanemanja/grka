<?php
		error_reporting(E_ALL & ~E_NOTICE & E_WARNING ^ E_DEPRECATED);
?>
<?php
		session_start();
		if(!isset($_SESSION['em'])){
		header('Location:index.html');
}
		require('konekcija.php');
		$folder="galerija/";
		$imeSlike=basename($_FILES["slika"]["name"]);
		$putanja=$folder." ".$imeSlike;
		$uploadOK=1;
		$tipFajla=pathinfo($putanja,PATHINFO_EXTENSION);

		if(isset($_POST['upload'])){
			$provera=getimagesize($_FILES["slika"]["tmp_name"]);
		if($provera==true){
			$uploadOK=1;
	}
		else{
			$uploadOK=0;
			echo "<script>alert('Fajl nije slika');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";

	}
}
		if(file_exists($putanja)){
			$uploadOK=0;
			echo "<script>alert('Fajl vec postoji');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";
}
		if($_FILES["slika"]["size"]>5000000){
			$uploadOK=0;
			echo "<script>alert('Fajl je preveliki');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";
}
		if($tipFajla!="jpg" && $tipFajla!="png" && $tipFajla!="jpeg" && $tipFajla!="gif"){
			$uploadOK=0;
			echo "<script>alert('Samo JPG, PNG i GIF formati su dozvoljeni');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";
}
		if($uploadOK==0){
			echo "<script>alert('Vasa slika nije upload-ovana');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";
}
		else{
		if(move_uploaded_file($_FILES["slika"]["tmp_name"],$putanja)){
			echo "<script>alert('Vasa slika je upload-ovana');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";

		$sql="INSERT INTO `sliketelefona` (`Path`) VALUES ('$putanja')";
		$rez=mysqli_query($konekcija,$sql);
		if($rez===false){
			echo "<script>alert('Doslo je do greske pri upload-u');</script>";
			echo "<script>window.location.assign('sliketelefona.php');</script>";
		}
	}
		else{
		$uploadOK=0;
		echo "<script>alert('Doslo je do greske pri upload-u');</script>";
		echo "<script>window.location.assign('sliketelefona.php');</script>";
		}
	}
