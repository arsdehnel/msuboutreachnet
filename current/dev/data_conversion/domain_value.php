<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/domain_value_05112010.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		list( $domain_value_id, $domain_id, $description, $code, $comments, $created_by, $created_date, $modified_by, $modified_date ) = explode( '|', fgets($file) );
	
		$sql	= "INSERT INTO arsdehnel_msub.domain_value VALUES (  " . $domain_value_id . ",
																	 " . $domain_id . ",
		 															'" . pg_escape_string( $description ) . "',
				 													'" . pg_escape_string( $code ) . "',
				 													'" . pg_escape_string( $comments ) . "',
		 															 " . $created_by . ",
		 															'" . pg_escape_string( $created_date ) . "',
		 															 " . $modified_by . ",
		 															'" . pg_escape_string( $modified_date ) . "')";
		 													
		$return_id	= fnc_process_sql( $sql, null );

	  	//echo '<hr />';
  	}
	
	fclose($file);
?>