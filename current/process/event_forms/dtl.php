<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_dtl.dao.php');
	
	$event_dtl							= new dao_arsdehnel_msub_event_dtl();
	$event_dtl		-> event_dtl_id		= $_POST['event_dtl_id'];
	$event_dtl		-> event_master_id	= $_POST['event_master_id'];
	$event_dtl		-> recurrence_ind 	= $_POST['recurrence_ind'];
	$event_dtl		-> start_date 		= $_POST['start_date'];
	$event_dtl		-> end_date 		= $_POST['end_date'];
	$event_dtl		-> start_time 		= $_POST['start_time'];
	$event_dtl		-> end_time			= $_POST['end_time'];
	$event_dtl		-> location_id 		= $_POST['location_id'];
	$event_dtl		-> primary_ind 		= $_POST['primary_ind'];
	$event_dtl		-> status_code 		= $_POST['status_code'];
	$event_dtl		-> comments 		= $_POST['comments'];
	$event_dtl		-> log_user_id 		= $_SESSION['user_id'];
	$event_dtl		-> save();
	
	echo "Date, time and location saved successfully.";

?>