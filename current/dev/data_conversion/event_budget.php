<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/event_budget.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.event_budget
	  		                    VALUES (
	  		                    		  nextval('arsdehnel_msub.event_budget_id_seq')
	  		                    		, " . $file_rec[0] . "
	  		                    		, " . $file_rec[1] . "
	  		                    		,'" . pg_escape_string( nvl( $file_rec[2], 'FIXED' ) ) . "'
	  		                    		, " . nvl( $file_rec[3], 'null' ) . "
	  		                    		, " . nvl( $file_rec[4], 'null' ) . "
	  		                    		, " . nvl( $file_rec[5], 'null' ) . "
	  		                    		, " . nvl( $file_rec[6], 'null' ) . "
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