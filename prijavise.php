<?php
	session_start();
?>

<?php
    error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
?>

<?php

  if(isset($_POST['logindugme'])){
      $e_mail = $_POST['e_mail'];
      $password = $_POST['password'];

    require('konekcija.php');
      $sql = "SELECT * FROM korisnici WHERE Email='".$e_mail."' AND Password='".$password."'";
      if(mysqli_connect($host, $server_username, $server_pass,$base))
          
              $x = mysqli_query($konekcija,$sql);
              if(mysqli_num_rows($x) == 1){

                  $_SESSION['em'] = $e_mail;
                  header('Location: pocetna.php');
              } 
              else {
                  echo "<script>
				alert('Nema pogodaka!!!');
				window.location.assign('index.html');
				</script>";
              }
         }

           
       
  