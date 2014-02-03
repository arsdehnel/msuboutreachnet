<?	

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_dtl.dao.php');
	
	$dtl_obj						= new dao_arsdehnel_msub_event_dtl();

	if( $_GET['event_dtl_id'] == 0 ){
		$dtl_obj					-> event_dtl_id = 0;
		$dtl_obj					-> event_master_id = $_GET['event_master_id'];
		$dtl_obj					-> status_code = 'A';
	}else{
		$dtl_obj					-> event_dtl_id = $_GET['event_dtl_id'];
		$dtl_obj					-> retrieve();	
	}
?>
<form action="/process/event_forms/dtl.php" method="post" id="dtl_form" style="width: 800px;">
	<table width="100%" cellpadding="0" cellspacing="0" style="border: 0px;">
		<tr>
			<td width="50%" style="border: 0px;">
				<label>Recurrence: </label>
					<?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'dtl_recurrence'
										   ORDER BY code
										     ,description", "recurrence_ind", null, $dtl_obj->recurrence_ind, null, null, null, null, 'width: 100px;', 1, 'recurrence_ind' );
					?><br />
				<label>Start Date: </label><input type="text" class="datepicker" name="start_date" value="<?=date('m/d/Y',strtotime($dtl_obj->start_date));?>" /><br />
				<label>End Date: </label><input type="text" class="datepicker" name="end_date" value="<?=date('m/d/Y',strtotime($dtl_obj->end_date));?>" /><br />
				<label>Start Time: </label>
					<?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'dtl_time'
										   ORDER BY code
										     ,description", "start_time", null, $dtl_obj->start_time, null, null, null, null, 'width: 100px;', 1, 'start_time' );
					?><br />
				<label>End Time: </label>
					<?
						prc_select_input( "SELECT code
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'dtl_time'
										   ORDER BY code
										     ,description", "end_time", null, $dtl_obj->end_time, null, null, null, null, 'width: 100px;', 1, 'end_time' );
					?><br />
				<label>Location: </label>
					<?
						prc_select_input( "SELECT domain_value_id
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'dtl_location'
										   ORDER BY code
										     ,description", "location_id", null, $dtl_obj->location_id, null, null, null, null, 'width: 300px;', 1, 'location_id' );
					?><br />
				<label>Primary Location? </label>
					<?
						prc_select_input( "SELECT dv_code
											 ,description
										   FROM arsdehnel_msub.vue_domain_group_value
										   WHERE d_code = 'status_code'
										     AND dgm_code = 'yes_no'", "primary_ind", null, $dtl_obj->primary_ind, null, null, null, null, 'width: 100px;', 1, 'primary_ind' );
					?>
			</td>
		</tr>
	</table>
	<div class="button_group">
		<button type="submit" class="btn primary"><span><span>Save</span></span></button>&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn modal_close"><span><span>Cancel</span></span></button>
		<input type="hidden" name="event_master_id" id="event_master_id" value="<?=$dtl_obj->event_master_id;?>">
		<input type="hidden" name="event_dtl_id" value="<?=$dtl_obj->event_dtl_id;?>">
		<input type="hidden" name="status_code" value="<?=$dtl_obj->status_code;?>">
		<input type="hidden" name="comments" value="<?=$dtl_obj->comments;?>">
	</div>
</form>
<script type="text/javascript">
			
	$(function(){
	
		$(".datepicker").datepicker({
			showOn: 'button',
			buttonImage: '/images/icons/calendar.gif',
			buttonImageOnly: true
		});

		$('#dtl_form').submit(function(){
		
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
					$('#dtl_wrapper').load('/_components/events/subforms/dtl.cmpnt.php?event_master_id='+event_master_id);
				}  
			});
			
			return false;
		
		});
	
	});
</script>
<script language="javascript">

	function validate(){
	
		var start_date = document.frm_event_search.start_date
		var end_date = document.frm_event_search.end_date
		if (isDate(start_date.value)==false){
			start_date.focus();
			return false
		}else if (isDate(end_date.value)==false){
			end_date.focus();
			return false
		}else{
			return true;
		}	
	
	}

</script>