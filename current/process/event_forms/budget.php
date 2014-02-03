<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_budget.dao.php');
	
	$event_budget							= new dao_arsdehnel_msub_event_budget();
	$event_budget		-> event_budget_id	= $_POST['event_budget_id'];
	$event_budget		-> event_master_id	= $_POST['event_master_id'];
	$event_budget		-> budget_item_id	= $_POST['budget_item_id'];
	$event_budget		-> budget_type		= $_POST['budget_type'];
	$event_budget		-> proj_nbr			= $_POST['proj_nbr'];
	$event_budget		-> proj_cost		= $_POST['proj_cost'];
	$event_budget		-> act_nbr			= $_POST['act_nbr'];
	$event_budget		-> act_cost			= $_POST['act_cost'];
	$event_budget		-> status_code		= $_POST['status_code'];
	$event_budget		-> comments			= $_POST['comments'];
	$event_budget		-> log_user_id		= $_SESSION['user_id'];
	$event_budget		-> save();
	
	echo "Budget item saved successfully.";
	
?>