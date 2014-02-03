<?

	session_start();
	require_once('/home/www/pm_common/system.php');

	switch( $_POST['data_type'] ){
	
		case "event_personnel_select":
		
			$rs		= fnc_rs_lookup( "SELECT personnel_id as code
										 ,last_name || ', ' || first_name || ' (' || psnl_type || ')' as label
									  FROM arsdehnel_msub.personnel
									  WHERE psnl_type = '" . $_POST['psnl_type'] . "'
									  ORDER BY last_name
									     ,first_name" );
									     
			if( $rs ){
			
				while( $rec = pg_fetch_array( $rs ) ){
				
					echo '<option value="' . $rec['code'] . '">' . $rec['label'] . '</option>';
				
				}
			
			}
		
			break;
			
		case "event_personnel_role":
		
			$rs		= fnc_rs_lookup( "SELECT dv_code as code
										 ,description as label
									  FROM arsdehnel_msub.vue_domain_group_value
									  WHERE d_code = 'event_personnel_role'
									    AND dgm_code = '" . $_POST['psnl_type'] . "'" );
									     
			if( $rs ){
			
				while( $rec = pg_fetch_array( $rs ) ){
				
					echo '<option value="' . $rec['code'] . '">' . $rec['label'] . '</option>';
				
				}
			
			}else{
			
				echo 'test';
			
			}
		
			break;
			

		default: 
		
			echo 'TEST'.$_POST['data_type'];
	
	}

?>