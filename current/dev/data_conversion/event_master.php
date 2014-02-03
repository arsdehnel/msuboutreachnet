<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/event_master.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		$sql		= "INSERT INTO arsdehnel_msub.event_master 
  		                    VALUES (
  		                    		  " . $file_rec[0] . "
  		                    		,'" . pg_escape_string( $file_rec[1] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[2] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[3] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[4] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[5] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[6] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[7] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[8] ) . "'
  		                    		,to_date('" . $file_rec[9] . "','MM/DD/YYYY')
  		                    		,'" . pg_escape_string( $file_rec[10] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[11] ) . "'
  		                    		, " . nvl( $file_rec[12], 'null' ) . "
  		                    		,'" . pg_escape_string( $file_rec[13] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[14] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[15] ) . "'
  		                    		, " . nvl( $file_rec[16], 'null' ) . "
  		                    		, " . nvl( $file_rec[17], 'null' ) . "
  		                    		, " . nvl( $file_rec[18], 'null' ) . "
  		                    		, " . nvl( $file_rec[19], 'null' ) . "
  		                    		, " . nvl( $file_rec[20], 'null' ) . "
  		                    		, " . nvl( $file_rec[21], 'null' ) . "
  		                    		,'" . pg_escape_string( $file_rec[22] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[23] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[24] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[25] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[26] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[27] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[28] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[29] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[30] ) . "'
  		                    		,'" . pg_escape_string( $file_rec[31] ) . "'
  		                    		, " . nvl( $file_rec[32], 'null' ) . "
  		                    		,to_timestamp('" . $file_rec[33] . "','MM/DD/YYYY')
  		                    		, " . nvl( $file_rec[34], 'null' ) . "
  		                    		,to_timestamp('" . $file_rec[35] . "','MM/DD/YYYY'))";
  		                    		
		$return_id	= fnc_process_sql( $sql, null );
  			
  	}
	
	fclose($file);
?>