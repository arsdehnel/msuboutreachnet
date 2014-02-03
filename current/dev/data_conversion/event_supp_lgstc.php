<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/event_supp_logistics.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		$sql		= "INSERT INTO arsdehnel_msub.event_supp_logistic
  		                    VALUES (
  		                    		  nextval('arsdehnel_msub.event_supp_lgstc_id_seq')
  		                    		, " . $file_rec[0] . "
  		                    		,'" . pg_escape_string( $file_rec[1] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[2] ) . "'
  		                    		, " . nvl( $file_rec[3], 1 ) . "
  		                    		,'A'
  		                    		,null  		                    		
  		                    		, " . nvl( $file_rec[4], 1 ) . "
  		                    		,to_timestamp('" . $file_rec[5] . "','MM/DD/YYYY')
  		                    		, " . nvl( $file_rec[6], 'null' ) . "
  		                    		,to_timestamp('" . $file_rec[7] . "','MM/DD/YYYY'))";
  		                    		
		$return_id	= fnc_process_sql( $sql, null );
  			
  	}
	
	fclose($file);
?>