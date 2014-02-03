<?
	require_once('/home/www/pm_common/system.php');

	$actions	= array(
						array(
							'label' => 'Edit',
							'class' => 'btn modal primary',
							'href' => '/events/evals.form.php?event_eval_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						), 
						array(
							'label' => 'Remove',
							'class' => 'btn modal',
							'href' => '/modal/confirm.php?rec_type=event_eval&event_eval_id=%%&event_master_id=' . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id )
						) 
				  );

	prc_data_grid( "SELECT ee.event_eval_id
					  ,ee.q1_ansr as \"Q1\"
					  ,ee.q2_ansr as \"Q2\"
					  ,ee.q3_ansr as \"Q3\"
					  ,ee.q4_ansr as \"Q4\"
					  ,ee.q5_ansr as \"Q5\"
					  ,ee.q6_ansr as \"Q6\"
					  ,ee.q7_ansr as \"Q7\"
					  ,ee.q8_ansr as \"Q8\"
					  ,ee.inst_feedback as \"Instructor\"
					  ,ee.ctnt_feedback as \"Content\"
					  ,ee.loc_feedback as \"Location\"
					  ,ee.otr_feedback as \"Other\"
					  ,ee.addl_courses as \"Addl Courses\"
					  ,to_char(ee.eval_date,'MM/DD/YYYY') as \"Eval Date\"
					FROM arsdehnel_msub.event_evals ee
					WHERE ee.event_master_id = " . nvl( $_GET['event_master_id'], $event_master_obj->event_master_id ) . "
					  AND ee.status_code = 'A'"
					,'Y'
					,$actions );