<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/personnel_address.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
  			switch( strtoupper( $file_rec[1] ) ){
  			
  				case 'MAIN':
  				case 'MAILING':
  				
  					$addr_type = 'M';
  					break;
  						
  				case 'HOME':
  				
  					$addr_type = 'H';
  					break;
  					
  				case 'WORK':
  				
  					$addr_type = 'W';
  					break;		
  						
  				default:
  				
  					$addr_type = 'W';
   					break;
  			
  			}//switch type
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.personnel_address
	  		                    VALUES (
	  		                    		  nextval('arsdehnel_msub.personnel_address_id_seq')
	  		                    		, " . $file_rec[0] . "
	  		                    		,'" . pg_escape_string( $addr_type ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[2] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[3] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[4] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[5] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[6] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[7] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[8] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[9] ) . "'
	  		                    		,null
	  		                    		, " . nvl( $file_rec[10], 1 ) . "
	  		                    		,to_timestamp('" . $file_rec[11] . "','MM/DD/YYYY')
	  		                    		, " . nvl( $file_rec[12], 'null' ) . "
	  		                    		,to_timestamp('" . $file_rec[13] . "','MM/DD/YYYY'))";
	  		                    		
			$return_id	= fnc_process_sql( $sql, null );

		}
  			
  	}
	
	fclose($file);
?>