<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/personnel_email.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
  			switch( strtoupper( $file_rec[1] ) ){
  			
  				case 'HOME':
  				
  					$email_type = 'H';
  					break;
  					
  				case 'MAIN':
  				
  					$email_type = 'M';
  					break;
  					
  				case 'MAIN-WORK':
  				case 'OFFICE':
  				case 'WORK':
  				
  					$email_type = 'W';
  					break;
  					
  				case 'PERSONAL':
  				case 'PERSONAL/SUMMER':
  				case 'PERSONEL/SUMMER':
  				case 'SUMMER EMAIL':
  				
  					$email_type = 'P';
  					break;  				
  					
  				default:
  				
  					$email_type = 'W';
  					break;
  			
  			}//switch type
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.personnel_email
	  		                    VALUES (
	  		                    		  nextval('arsdehnel_msub.personnel_email_id_seq')
	  		                    		, " . $file_rec[0] . "
	  		                    		,'" . pg_escape_string( $email_type ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[2] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[3] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[4] ) . "'
	  		                    		,null
	  		                    		, " . nvl( $file_rec[5], 1 ) . "
	  		                    		,to_timestamp('" . $file_rec[6] . "','MM/DD/YYYY')
	  		                    		, " . nvl( $file_rec[7], 'null' ) . "
	  		                    		,to_timestamp('" . $file_rec[8] . "','MM/DD/YYYY'))";
	  		                    		
			$return_id	= fnc_process_sql( $sql, null );

		}
  			
  	}
	
	fclose($file);
?>