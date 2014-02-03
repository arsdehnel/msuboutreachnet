<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/event_evals.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.event_evals
	  		                    VALUES (
	  		                    		  nextval('arsdehnel_msub.event_eval_id_seq')
	  		                    		, " . $file_rec[0] . "
	  		                    		, " . nvl( $file_rec[1], 0 ) . "
	  		                    		, " . nvl( $file_rec[2], 0 ) . "
	  		                    		, " . nvl( $file_rec[3], 0 ) . "
	  		                    		, " . nvl( $file_rec[4], 0 ) . "
	  		                    		, " . nvl( $file_rec[5], 0 ) . "
	  		                    		, " . nvl( $file_rec[6], 0 ) . "
	  		                    		, " . nvl( $file_rec[7], 0 ) . "
	  		                    		, " . nvl( $file_rec[8], 0 ) . "
	  		                    		,'" . pg_escape_string( $file_rec[9] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[10] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[11] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[12] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[13] ) . "'
	  		                    		,to_date('" . $file_rec[14] . "','MM/DD/YYYY')
	  		                    		,'A'
	  		                    		,null
	  		                    		, " . nvl( $file_rec[15], 1 ) . "
	  		                    		,to_timestamp('" . $file_rec[16] . "','MM/DD/YYYY')
	  		                    		, " . nvl( $file_rec[17], 'null' ) . "
	  		                    		,to_timestamp('" . $file_rec[18] . "','MM/DD/YYYY'))";
	  		                    		
			$return_id	= fnc_process_sql( $sql, null );

		}
  			
  	}
	
	fclose($file);
?>