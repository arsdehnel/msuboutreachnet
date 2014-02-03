<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_evals.dao.php');
	
	$eval								= new dao_arsdehnel_msub_event_evals();
	$eval			-> event_eval_id	= $_POST['event_eval_id'];
	$eval			-> event_master_id	= $_POST['event_master_id'];
	$eval			-> q1_ansr		 	= $_POST['q1_ansr'];
	$eval			-> q2_ansr		 	= $_POST['q2_ansr'];
	$eval			-> q3_ansr		 	= $_POST['q3_ansr'];
	$eval			-> q4_ansr		 	= $_POST['q4_ansr'];
	$eval			-> q5_ansr		 	= $_POST['q5_ansr'];
	$eval			-> q6_ansr		 	= $_POST['q6_ansr'];
	$eval			-> q7_ansr		 	= $_POST['q7_ansr'];
	$eval			-> q8_ansr		 	= $_POST['q8_ansr'];
	$eval			-> inst_feedback 	= $_POST['inst_feedback'];
	$eval			-> ctnt_feedback 	= $_POST['ctnt_feedback'];
	$eval			-> loc_feedback 	= $_POST['loc_feedback'];
	$eval			-> otr_feedback 	= $_POST['otr_feedback'];
	$eval			-> addl_courses 	= $_POST['addl_courses'];
	$eval			-> eval_date 		= $_POST['eval_date'];
	$eval			-> status_code 		= $_POST['status_code'];
	$eval			-> comments 		= $_POST['comments'];
	$eval			-> log_user_id 		= $_SESSION['user_id'];
	$eval			-> save();
	
	echo "Evaluation saved successfully.";

?>