<?	

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_evals.dao.php');
	
	$eval_obj						= new dao_arsdehnel_msub_event_evals();

	if( $_GET['event_eval_id'] == 0 ){
		$eval_obj					-> event_eval_id = 0;
		$eval_obj					-> event_master_id = $_GET['event_master_id'];
		$eval_obj					-> status_code = 'A';
	}else{
		$eval_obj					-> event_eval_id = $_GET['event_eval_id'];
		$eval_obj					-> retrieve();	
	}
?>
<form action="/events/evals.prcs.php" method="post" id="eval_form" style="width: 800px;">
	<div style="float: left; width: 300px; padding: 4px;">
		<div class="sfrm_section_title">Rating Questions: </div>
		<label>1: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q1_ansr", null, nvl( $eval_obj->q1_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q1_ansr' );
		?><br />
		<label>2: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q2_ansr", null, nvl( $eval_obj->q2_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q2_ansr' );
		?><br />
		<label>3: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q3_ansr", null, nvl( $eval_obj->q3_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q3_ansr' );
		?><br />
		<label>4: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q4_ansr", null, nvl( $eval_obj->q4_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q4_ansr' );
		?><br />
		<label>5: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q5_ansr", null, nvl( $eval_obj->q5_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q5_ansr' );
		?><br />
		<label>6: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q6_ansr", null, nvl( $eval_obj->q6_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q6_ansr' );
		?><br />
		<label>7: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q7_ansr", null, nvl( $eval_obj->q7_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q7_ansr' );
		?><br />
		<label>8: </label><?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'evaluation_answers'
							   ORDER BY code
							     ,description", "q8_ansr", null, nvl( $eval_obj->q8_ansr, 5 ), null, null, null, null, 'width: 100px;', 1, 'q8_ansr' );
		?>
	</div>
	<div style="float: left; width: 450px; padding: 4px;">
		<div class="sfrm_section_title">Feedback: </div>
		<label>Instructor: </label><textarea name="inst_feedback" style="width: 300px; height: 30px;"><?=$eval_obj->inst_feedback;?></textarea><br />
		<label>Content: </label><textarea name="ctnt_feedback" style="width: 300px; height: 30px;"><?=$eval_obj->ctnt_feedback;?></textarea><br />
		<label>Location: </label><textarea name="loc_feedback" style="width: 300px; height: 30px;"><?=$eval_obj->loc_feedback;?></textarea><br />
		<label>Other Comments: </label><textarea name="otr_feedback" style="width: 300px; height: 30px;"><?=$eval_obj->otr_feedback;?></textarea><br />
		<label>Additional Courses: </label><textarea name="addl_courses" style="width: 300px; height: 30px;"><?=$eval_obj->addl_courses;?></textarea><br />
		<label>Evaluation Date: </label><input type="text" class="datepicker" name="eval_date" value="<?=$eval_obj->eval_date;?>" /><br />
	</div>
	<div class="button_group">
		<button type="submit" class="btn"><span><span>Save Evaluation</span></span></button>
		<button type="button" class="secondary_button modal_close">Cancel</button>
	</div>
	<input type="hidden" name="event_master_id" id="event_master_id" value="<?=$eval_obj->event_master_id;?>">
	<input type="hidden" name="event_eval_id" value="<?=$eval_obj->event_eval_id;?>">
	<input type="hidden" name="status_code" value="<?=$eval_obj->status_code;?>" />
</form>
<script type="text/javascript">
			
	$(function(){
	
		$(".datepicker").datepicker({
			showOn: 'button',
			buttonImage: '/images/icons/calendar.gif',
			buttonImageOnly: true
		});

		$('form').submit(function(){
		
			var form			= $(this);
			var data_string		= $(this).serialize();
			var action			= $(this).attr('action');
			var event_master_id	= $('#event_master_id').val();
			
			$.ajax({  
				type: "POST",  
				url: action,  
				data: data_string,  
				success: function(data, status) {  
					form.html(data);
					$('#evals_wrapper').load('/events/evals.list.php?event_master_id='+event_master_id);
				}  
			});
			
			return false;
		
		});
	
	});
</script>
