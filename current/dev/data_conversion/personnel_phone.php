<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/personnel_phone.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
  			switch( strtoupper( $file_rec[1] ) ){
  			
  				case 'HOME':
  				
  					$phone_type = 'H';
  					break;
  					
  				case 'MAIN':
  				
  					$phone_type = 'M';
  					break;
  					
  				case 'WORK':
  				case 'DIRECTOR, SAFETY AND SECURITY':
  				case 'DOWNTOWN':
  				case 'DOWNTOWN OFFICE':
  				case 'OFFICE':
  				case 'RED LODGE OFFICE':
 				case 'W':
 				case 'WORK TOO':
  				
  					$phone_type = 'W';
  					break;
  					
  				case 'FAX':
  				
  					$phone_type = 'F';
  					break;
  					
				case 'CEKK':
				case 'CELL':
				case 'CELL PHONE':
				case 'MOBILE':
				case 'MOBLE':
				
					$phone_type = 'C';
					break;

  				case 'ALTERNATE':
  				case 'ALTERNATE (SUMMER)':
  				case 'ALTERNATE OFFICE':
  				
  					$phone_type = 'A';
  					break;  				
  					
  				default:
  				
  					$phone_type = 'M';
  					break;
  			
  			}//switch type
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.personnel_phone
	  		                    VALUES (
	  		                    		  nextval('arsdehnel_msub.personnel_phone_id_seq')
	  		                    		, " . $file_rec[0] . "
	  		                    		,'" . pg_escape_string( $phone_type ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[2] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[3] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[4] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[5] ) . "'
	  		                    		,null
	  		                    		, " . nvl( $file_rec[6], 1 ) . "
	  		                    		,to_timestamp('" . $file_rec[7] . "','MM/DD/YYYY')
	  		                    		, " . nvl( $file_rec[8], 'null' ) . "
	  		                    		,to_timestamp('" . $file_rec[9] . "','MM/DD/YYYY'))";
	  		                    		
			$return_id	= fnc_process_sql( $sql, null );

		}
  			
  	}
	
	fclose($file);
?>