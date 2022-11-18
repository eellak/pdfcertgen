<?php  // KOMATI GIA THN LUPSH BEBAIOSHS / FORMA
   
    if(isset($_GET['d'])) $dev = $_GET['d'] ;
    
   if($_SERVER['HTTP_HOST']	== "subdomain.ellak.gr" && get_the_ID() == 969) {
	
	 if(isset($_POST["email"]) && $_POST["email"] != "") { 
	
	global $wpdb;
$results = $wpdb->get_results( $wpdb->prepare("SELECT ID, group_concat(meta_key), group_concat(meta_value SEPARATOR ' ') 
      FROM wp_posts LEFT JOIN wp_postmeta ON ID = post_id 
      WHERE post_type = 'nf_sub' AND (  meta_key = '_field_67' ) AND ID IN
               ( SELECT MAX(post_id) AS ID FROM wp_postmeta 
                 WHERE meta_key = '_field_68' AND meta_value=%s )
      GROUP BY ID ", $_POST["email"]) , ARRAY_A );

  $tosa = count($results) ;  
         
     if($tosa > 0) { 
	    echo "<br /><br /><strong>Παρακαλώ <a href='/pdfcert/bebaiosh.php?conf=cert1&email={$_POST['email']}' target='_blank'>πατήστε εδώ για να κατεβάσετε την βεβαίωση παρακολούθησης</a>.</strong>" ;
      }  else  {
	    echo "<strong>Το Email \"{$_POST['email']}\" δεν βρέθηκε στην λίστα της 'επιβεβαίωσης εγγραφής'.</strong><br /><br />" ;
	 }
}
?>



<?php if($tosa  < 1) { ?>
Παρακαλώ συμπληρώστε το email σας για να γίνει αναζήτηση των στοιχείων σας:<br  /><br  />

<form method="post" action="?d=1" enctype="multipart/form-data"><input name="email" type="text">
     <input name="Submit" value="Αποστολή" type="submit">
</form>
<?php } // END OF IF TOSA < 1 - emfanish formas ?>
					

<?php } // END OF IF 2604 ?>