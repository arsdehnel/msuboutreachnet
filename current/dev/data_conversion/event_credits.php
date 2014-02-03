<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/event_credit.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.event_credits
	  		                    VALUES (
	  		                    		  nextval('arsdehnel_msub.event_credit_id_seq')
	  		                    		, " . $file_rec[0] . "
	  		                    		, " . $file_rec[1] . "
	  		                    		, " . $file_rec[2] . "
	  		                    		, " . nvl( $file_rec[3], 'null' ) . "
	  		                    		, " . $file_rec[4] . "
	  		                    		,'" . pg_escape_string( $file_rec[5] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[6] ) . "'
	  		                    		,'A'
	  		                    		,null
	  		                    		, " . nvl( $file_rec[7], 1 ) . "
	  		                    		,to_timestamp('" . $file_rec[8] . "','MM/DD/YYYY')
	  		                    		, " . nvl( $file_rec[9], 'null' ) . "
	  		                    		,to_timestamp('" . $file_rec[10] . "','MM/DD/YYYY'))";
	  		                    		
			$return_id	= fnc_process_sql( $sql, null );

		}
  			
  	}
	
	fclose($file);
?>