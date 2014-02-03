<?

	session_start();
	require_once('/home/www/pm_common/system.php');

	switch( $_POST['process_type'] ){
	
		case "INSRT":
		
			$sql = "INSERT INTO arsdehnel_msub.event_master (event_master_id
															,event_title
															,event_crn
															,event_rubric
															,event_number
															,event_section
															,event_quarter
															,event_semester
															,event_year
															,event_type
															,status_code
															,created_by
															,created_date)
												 	VALUES (nextval('arsdehnel_msub.event_master_id_seq')
												 			,'" . pg_escape_string( $_POST['event_title'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_crn'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_rubric'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_number'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_section'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_quarter'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_semester'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_year'] ) . "'
												 			,'" . pg_escape_string( $_POST['event_type'] ) . "'
												 			,'" . pg_escape_string( $_POST['status_code'] ) . "'
												 			, " . $_SESSION['user_id'] . "
												 			,now())";
												 			
			$event_master_id = fnc_process_sql( $sql, 'arsdehnel_msub.event_master_id_seq' );
			
			$_SESSION['success_line'] = 'Event added successfully.';
			header( "Location: /events/maint/index.php?id=".$event_master_id );
			break;
			
		default: 
		
			echo 'No process type indicated<br />';
			prc_array_dump( $_POST );
			break;
	
	}

?>