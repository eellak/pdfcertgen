<?php

	if(isset($_GET["email"]) && $_GET["email"] != '') {

/* database connection */
	$conn = mysqli_connect( $DB_HOST , $DB_USER, $DB_PASS);  
	mysqli_select_db( $conn, $DB_NAME) ; 

	$email = $_GET["email"] ;

	$emailcheck = mysqli_real_escape_string($conn, $email) ;

	$query = mysqli_query($conn, " SELECT ID, group_concat(meta_key), group_concat(meta_value SEPARATOR ' ') AS fullname FROM wp_posts LEFT JOIN wp_postmeta ON ID = post_id  WHERE post_type = 'nf_sub' AND (  meta_key = '_field_15' OR meta_key = '_field_16' )  AND ID IN ( SELECT  post_id  AS ID FROM wp_postmeta  WHERE meta_key = '_field_17' AND meta_value='$emailcheck' ) GROUP BY ID ") ;
	
	$row = mysqli_fetch_array($query) ;
	
	if(count($row) < 1) { echo "Δεν βρέθηκε το email, παρακαλώ επικοινωνήστε με τον διαχειριστή"; exit() ; } 
	
	$fullname = $row["fullname"];
}

	
?>