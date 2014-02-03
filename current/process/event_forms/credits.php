<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_credits.dao.php');
		
	$event_credits						= new dao_arsdehnel_msub_event_credits();
	$event_credits	-> event_credit_id	= $_POST['event_credit_id'];
	$event_credits	-> event_master_id	= $_POST['event_master_id'];
	$event_credits	-> type_id		 	= $_POST['type_id'];
	$event_credits	-> per_unit_amt		= $_POST['per_unit_amt'];
	$event_credits	-> per_unit_item_id	= $_POST['per_unit_item_id'];
	$event_credits	-> item_qty 		= $_POST['item_qty'];
	$event_credits	-> item_desc		= $_POST['item_desc'];
	$event_credits	-> primary_ind 		= $_POST['primary_ind'];
	$event_credits	-> status_code 		= $_POST['status_code'];
	$event_credits	-> comments 		= $_POST['comments'];
	$event_credits	-> log_user_id 		= $_SESSION['user_id'];
	$event_credits	-> save();
	
	echo "Credit/Fee saved successfully.";

?>