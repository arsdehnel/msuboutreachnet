<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	
	$return_id	= fnc_process_sql( "UPDATE arsdehnel_msub." . $_POST['rec_type'] . "
									   SET status_code = 'I'
									      ,modified_by = " . $_SESSION['user_id'] . "
									      ,modified_date = to_timestamp('" . date('m/d/Y H:i:s') . "', 'MM/DD/YYYY HH:MI:SS')
									 WHERE " . $_POST['id_field'] . " = " . $_POST['id'] );
									 
	if( is_integer( $return_id ) ){
		echo '0';
	}else{
		echo '1';
	}			

?>