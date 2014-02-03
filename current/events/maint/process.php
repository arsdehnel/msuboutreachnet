<?

	session_start();
	require_once('/home/www/pm_common/system.php');	
	require_once('/home/www/msuboutreach.net/dao/event_master.dao.php');
	
	$event_master							= new dao_arsdehnel_msub_event_master();
	$event_master		-> event_master_id	= $_POST['event_master_id'];
	$event_master		-> user_id			= $_SESSION['user_id'];
	
	switch( $_POST['process_type'] ){
	
		case "UPDTE":
	
			//label
				$event_master		-> event_title				= $_POST['event_title'];
				$event_master		-> event_crn				= $_POST['event_crn'];
				$event_master		-> event_rubric				= $_POST['event_rubric'];
				$event_master		-> event_number				= $_POST['event_number'];
				$event_master		-> event_section			= $_POST['event_section'];
				$event_master		-> event_quarter			= $_POST['event_quarter'];
				$event_master		-> event_semester			= $_POST['event_semester'];
				$event_master		-> event_year				= $_POST['event_year'];
				$event_master		-> selected_ind				= $_POST['selected_ind'];
				$event_master		-> event_rmks				= $_POST['event_rmks'];
				$event_master		-> caterer_notes			= $_POST['caterer_notes'];
				$event_master		-> rm_setup_notes			= $_POST['rm_setup_notes'];
				$event_master		-> outcms_cmts				= $_POST['outcms_cmts'];

			//basics
				$event_master		-> application_date			= $_POST['application_date'];
				$event_master		-> status_code				= $_POST['status_code'];
				$event_master		-> event_type				= $_POST['event_type'];
				$event_master		-> repetition_ind			= $_POST['repetition_ind'];
				$event_master		-> event_index				= $_POST['event_index'];
				$event_master		-> detail_code				= $_POST['detail_code'];
				$event_master		-> event_days				= $_POST['event_days'];
				$event_master		-> sponsorship_ind			= $_POST['sponsorship_ind'];
				$event_master		-> spnsr_dtls				= $_POST['spnsr_dtls'];
				$event_master		-> enrl_act					= $_POST['enrl_act'];
				$event_master		-> enrl_est					= $_POST['enrl_est'];
				$event_master		-> enrl_min					= $_POST['enrl_min'];
				$event_master		-> enrl_max					= $_POST['enrl_max'];
				$event_master		-> pax_days					= $_POST['pax_days'];
				$event_master		-> grading_ind				= $_POST['grading_ind'];
				$event_master		-> grd_to_inst				= $_POST['grd_to_inst'];
				$event_master		-> grd_fm_inst				= $_POST['grd_fm_inst'];
				$event_master		-> grd_to_reg				= $_POST['grd_to_reg'];
				
			//caf
				$event_master		-> event_desc				= $_POST['event_desc'];
				$event_master		-> tgt_audience				= $_POST['tgt_audience'];
				$event_master		-> eval_of_work				= $_POST['eval_of_work'];
				$event_master		-> req_mtrls				= $_POST['req_mtrls'];
				$event_master		-> pst_crse_wk				= $_POST['pst_crse_wk'];
				$event_master		-> caf_cmts					= $_POST['caf_cmts'];
				
			//budget
				$event_master		-> inv_comp_ind				= $_POST['inv_comp_ind'];
				$event_master		-> bdgt_notes				= $_POST['bdgt_notes'];
				
			//evaluations
				$event_master		-> eval_del_mthd			= $_POST['eval_del_mthd'];
				$event_master		-> eval_cmpl_ind			= $_POST['eval_cmpl_ind'];
				$event_master		-> eval_to_inst				= $_POST['eval_to_inst'];
				$event_master		-> eval_fm_inst				= $_POST['eval_fm_inst'];
				
			//room
				$event_master		-> sig_req_ind				= $_POST['sig_req_ind'];
				$event_master		-> rm_setup_day_ind			= $_POST['rm_setup_day_ind'];
				$event_master		-> rm_open_time				= $_POST['rm_open_time'];
				$event_master		-> rm_open_personnel_id		= $_POST['rm_open_personnel_id'];
				$event_master		-> rm_lock_time				= $_POST['rm_lock_time'];
				$event_master		-> rm_lock_personnel_id		= $_POST['rm_lock_personnel_id'];
				$event_master		-> rm_setup_time			= $_POST['rm_setup_time'];
				$event_master		-> rm_setup_personnel_id	= $_POST['rm_setup_personnel_id'];

			//catering
				$event_master		-> catering_time			= $_POST['catering_time'];
				$event_master		-> catering_personnel_id	= $_POST['catering_personnel_id'];
				$event_master		-> otsd_cat_title			= $_POST['otsd_cat_title'];
				$event_master		-> otsd_cat_cntct			= $_POST['otsd_cat_cntct'];
				$event_master		-> otsd_cat_phone			= $_POST['otsd_cat_phone'];
				
			//prc_array_dump( $event_master );	
		
			$event_master		-> save();
			$_SESSION['success_line'] = 'Event saved successfully.';
			Header( "Location: index.php?id=" . $event_master -> event_master_id );	
			break;
			
		case "RMOVE":
		
			$event_master		-> delete();
			break;
			
	}

?>