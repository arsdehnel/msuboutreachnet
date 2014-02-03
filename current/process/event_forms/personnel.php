<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_personnel.dao.php');
		
	$event_personnel							= new dao_arsdehnel_msub_event_personnel();
	$event_personnel	-> event_personnel_id	= $_POST['event_personnel_id'];
	$event_personnel	-> event_master_id		= $_POST['event_master_id'];
	$event_personnel	-> psnl_type			= $_POST['psnl_type'];
	$event_personnel	-> psnl_role			= $_POST['psnl_role'];
	$event_personnel	-> personnel_id			= $_POST['personnel_id'];
	$event_personnel	-> compensation			= $_POST['compensation'];
	$event_personnel	-> pymt_method			= $_POST['pymt_method'];
	$event_personnel	-> primary_ind			= $_POST['primary_ind'];
	$event_personnel	-> status_code			= $_POST['status_code'];
	$event_personnel	-> comments				= $_POST['comments'];
	$event_personnel	-> log_user_id			= $_SESSION['user_id'];
	$event_personnel	-> save();
	
	echo "Event personnel saved successfully.";

?>