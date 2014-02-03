<?

	require_once('/home/www/pm_common/system.php');

	$file = fopen("data_files/personnel.txt", "r") or exit("Unable to open file!");
	
	//Output a line of the file until the end is reached
	while(!feof($file))
  	{
  		$file_rec 	= explode( '|', str_replace('NULL','',fgets($file)) );
  		
  		if( strlen( $file_rec[0] ) > 1 ){
  		
  			switch( $file_rec[1] ){
  			
  				case "EX":
  				
  					$psnl_type	= 'EXT';
  					if( $file_rec[3] == 'AA' || $file_rec[3] == 'NA' || $file_rec[3] == 'NULL' ){
  						$psnl_role	= 'CT';
  					}else{
  						$psnl_role	= $file_rec[3];
  					}
  					break;
  				
  				case "ML":
  				
  					$psnl_type	= "MLM";
  					$psnl_role	= 'MLM';
  					break;
  					
  				case "ST":
  				
  					$psnl_type	= "INT";
  					if( $file_rec[3] == 'NA' || $file_rec[3] == 'NULL' ){
  						$psnl_role	= 'CT';
  					}else{
  						$psnl_role	= $file_rec[3];
  					}
  					break;
  			
  			}//psnl_type switch
  			
  			echo $file_rec[1] . '|' . $psnl_type . '<br />';
  		
	  		$sql		= "INSERT INTO arsdehnel_msub.personnel
	  		                    VALUES (
	  		                    		  " . $file_rec[0] . "
	  		                    		,'" . pg_escape_string( $psnl_type ) . "'
	  		                    		,'" . pg_escape_string( $psnl_role ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[4] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[5] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[6] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[8] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[9] ) . "'
	  		                    		,'" . pg_escape_string( $file_rec[10] ) . "'
	  		                    		," . $file_rec[11] . "
	  		                    		,'" . pg_escape_string( $file_rec[12] ) . "'
	  		                    		,null
	  		                    		, " . nvl( $file_rec[13], 1 ) . "
	  		                    		,to_timestamp('" . $file_rec[14] . "','MM/DD/YYYY')
	  		                    		, " . nvl( $file_rec[15], 'null' ) . "
	  		                    		,to_timestamp('" . $file_rec[16] . "','MM/DD/YYYY'))";
	  		                    		
			$return_id	= fnc_process_sql( $sql, null );

		}
  			
  	}
	
	fclose($file);
?>