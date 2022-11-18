<?php


	if(isset($_GET["email"]) && $_GET["email"] != '' && isset($_GET["conf"]) && $_GET["conf"] != '') {
		switch($_GET["conf"]){
			case "cert1":
				require('cert1.php');
				break;
			case "cert2":
				require('cert2.php');
				break;
			case "cert3":
				require('cert3.php');
				break;
		}
	}


?>
