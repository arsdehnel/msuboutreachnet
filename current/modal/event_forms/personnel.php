<?

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_personnel.dao.php');
		
	$ep_obj							= new dao_arsdehnel_msub_event_personnel();
	
	if( $_GET['event_personnel_id'] == 0 ){
		$ep_obj						-> event_personnel_id	= 0;
		$ep_obj						-> event_master_id		= $_GET['event_master_id'];
		$ep_obj						-> compensation			= 0;
		$ep_obj						-> status_code			= 'A';
	}else{
		$ep_obj						-> event_personnel_id	= $_GET['event_personnel_id'];
		$ep_obj						-> retrieve();
	}
?>
<form action="/process/event_forms/personnel.php" method="post" name="personnel_maintenance_form" id="personnel_form">
	<label>Personnel Type: </label>
		<?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'event_personnel_type'
							   ORDER BY code
							     ,description", "psnl_type", null, $ep_obj->psnl_type, null, null, "[ Select Type ]", " ", 'width: 300px;', 1, 'psnl_type' );
		?><br />
	<label>Role: </label>
		<?
			prc_select_input( "SELECT dv_code
								 ,description
							   FROM arsdehnel_msub.vue_domain_group_value
							   WHERE d_code = 'event_personnel_role'
							   ORDER BY dv_code
							     ,description", "psnl_role", null, $ep_obj->psnl_role, null, null, "[ Select Role ]", " ", 'width: 150px;', 1, 'psnl_role' );
		?><br />
	<label>Personnel: </label>
		<?
			prc_select_input( "SELECT personnel_id
								 ,last_name || ', ' || first_name || ' (' || psnl_type || ')'
							   FROM arsdehnel_msub.personnel
							   ORDER BY last_name
							     ,first_name", "personnel_id", null, $ep_obj->personnel_id, null, null, null, null, 'width: 300px;', 1, 'personnel_id' );
		?><br />
	<label>Compensation: </label><input type="text" name="compensation" value="<?=$ep_obj->compensation;?>" onBlur="check_number(this.value,'Please input only numbers into the compensation field.');"><br />
	<label>Pay Method: </label>
		<?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'payment_method'
							   ORDER BY code
							     ,description", "pymt_method", null, $ep_obj->pymt_method, null, null, null, null, 'width: 150px;', 1, 'pymt_method' );
		?><br />
	<label>Primary? </label>
		<?
			prc_select_input( "SELECT dv_code
								 ,description
							   FROM arsdehnel_msub.vue_domain_group_value
							   WHERE d_code = 'status_code'
							     AND dgm_code = 'yes_no'", "primary_ind", null, $ep_obj->primary_ind, null, null, null, null, 'width: 100px;', 1, 'primary_ind' );
		?><br />
	<div class="button_group">
		<button type="submit" class="btn primary"><span><span>Save</span></span></button>
		<button type="button" class="btn modal_close"><span><span>Cancel</span></span></button>
		<input type="hidden" name="event_master_id" id="event_master_id" value="<?=$ep_obj->event_master_id;?>">
		<input type="hidden" name="event_personnel_id" value="<?=$ep_obj->event_personnel_id;?>">
		<input type="hidden" name="status_code" value="<?=$ep_obj->status_code;?>" />
	</div>
</form>
<script type="text/javascript">
	
	$(function(){
	
		$('#personnel_form').submit(function(){
		
			var form			= $(this);
			var data_string 	= $(this).serialize();
			var action			= $(this).attr('action');
			var event_master_id	= $('#event_master_id').val();
			var psnl_type		= $('#psnl_type').val();
			
			$.ajax({  
				type: "POST",  
				url: action,  
				data: data_string,  
				success: function(data, status) {  
					form.html(data+'<br />'); 
					if( psnl_type == 'INT' ){
						$('#personnel_int_wrapper').load('/_components/events/subforms/personnel.cmpnt.php?psnl_type='+psnl_type+'&event_master_id='+event_master_id);		
					}else{
						$('#personnel_ext_wrapper').load('/_components/events/subforms/personnel.cmpnt.php?psnl_type='+psnl_type+'&event_master_id='+event_master_id);		
					}
				}  
			});
			
			return false;
		
		});
		
		$('#psnl_type').change(function(){
		
			var psnl_type 		= $(this).val();
			
			//clear the personnel list
			$('#personnel_id').children().remove();
			
			$.ajax({
				type: "POST",
				url: "/ajax/personnel.php",
				data: 'data_type=event_personnel_role&psnl_type='+psnl_type,
				success: function(data,status){
					$('#psnl_role').html(data);
				}
			
			});
	
			$.ajax({
				type: "POST",
				url: "/ajax/personnel.php",
				data: 'data_type=event_personnel_select&psnl_type='+psnl_type,
				success: function(data,status){
					$('#personnel_id').html(data);
				}
			
			});
	
		})
	
	});
	
</script>
<script language="javascript">

	function validate(){
	
		if(personnel_maintenance_form.personnel_id.value.length == 0){
			alert("Please select a personnel.");
		}
		else{
			personnel_maintenance_form.submit();
		}
	
	}

</script>