<?	

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_budget.dao.php');
	
	$eb_obj							= new dao_arsdehnel_msub_event_budget();

	if( $_GET['event_budget_id'] == 0 ){
		$eb_obj						-> event_budget_id		= 0;
		$eb_obj						-> event_master_id		= $_GET['event_master_id'];
		$eb_obj						-> status_code			= 'A';
		/*$budget_id				= 0
		int_event_id				= Request.QueryString("event_id")
		str_submit_button_text 		= "Add Budget Item"
		str_budget_type 			= ""
		int_budget_item_id 			= 0
		int_projected_number 		= 0
		int_projected_cost 			= 0
		int_projected_total 		= int_projected_number * int_projected_cost
		int_actual_number 			= 0
		int_actual_cost 			= 0
		int_actual_total 			= int_actual_number * int_actual_cost
		str_status_code				= "A"
		str_process_type			= "INSRT"*/
	}else{
		$eb_obj						-> event_budget_id		= $_GET['event_budget_id'];
		$eb_obj						-> retrieve(); 		
	}
?>
<form action="/process/event_forms/budget.php" method="post" id="budget_form">
	<label>Item: </label>
		<?
			prc_select_input( "SELECT domain_group_detail_id
								 ,dgm_description || ': ' || description
							   FROM arsdehnel_msub.vue_domain_group_value
							   WHERE d_code = 'budget_items'
							   ORDER BY dgm_description || ': ' || description", "budget_item_id", null, $eb_obj->budget_item_id, null, null, null, null, 'width: 300px;', 1, 'budget_item_id' );
		?><br />
	<label>Type: </label>
		<?
			prc_select_input( "SELECT code
								 ,description
							   FROM arsdehnel_msub.vue_domain_value
							   WHERE domain_code = 'budget_types'
							   ORDER BY code
							     ,description", "budget_type", null, $eb_obj->budget_type, null, null, null, "[ Please select a budget type ]", 'width: 300px;', 1, 'budget_type' );
		?><br /><br />
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
			<td>
				Number
			</td>
			<td>
				Cost
			</td>
			<td>
				Total
			</td>
		</tr>
		<tr>
			<td>
				Projected:
			</td>
			<td>
				<input type="text" name="proj_nbr" id="proj_nbr" class="calc_field" value="<?=$eb_obj->proj_nbr;?>" style="width: 100px;">
			</td>
			<td>
				<input type="text" name="proj_cost" id="proj_cost" class="calc_field" value="<?=$eb_obj->proj_cost;?>" style="width: 100px;">
			</td>
			<td>
				<input type="text" name="proj_total" id="proj_total" class="calc_field" value="<?=$eb_obj->proj_ttl;?>" style="width: 100px;" disabled>
			</td>
		</tr>
		<tr>
			<td>Actual:</td>
			<td>
				<input type="text" name="act_nbr" id="act_nbr" class="calc_field" value="<?=$eb_obj->act_nbr;?>" style="width: 100px;">
			</td>
			<td>
				<input type="text" name="act_cost" id="act_cost" class="calc_field" value="<?=$eb_obj->act_cost;?>" style="width: 100px;">
			</td>
			<td>
				<input type="text" name="act_total" id="act_total" class="calc_field" value="<?=$eb_obj->act_ttl;?>" style="width: 100px;" disabled>
			</td>
		</tr>
	</table>
	<div class="button_group">
		<button type="submit" class="btn primary"><span><span>Save</span></span></button>&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn modal_close"><span><span>Cancel</span></span></button>
		<input type="hidden" name="event_master_id" value="<?=$eb_obj->event_master_id;?>">
		<input type="hidden" name="event_budget_id" value="<?=$eb_obj->event_budget_id;?>">
		<input type="hidden" name="status_code" value="<?=$eb_obj->status_code;?>" />
	</div>
</form>
<script type="text/javascript">
	
	function calc_values(type){
	
		var cost;
		var nbr;
			
		if( type == 'proj' ){
			
			nbr		= $('#proj_nbr').val();
			cost	= $('#proj_cost').val();
			$('#proj_total').val( nbr * cost );
			
		}else if( type == 'act' ){

			nbr		= $('#act_nbr').val();
			cost	= $('#act_cost').val();
			$('#act_total').val( nbr * cost );
		
		}

	}
	
	calc_values('proj');
	calc_values('act');
	
	$(function(){
	
		$('#budget_form').submit(function(){
		
			var form			= $(this);
			var data_string 	= $(this).serialize();
			var action			= $(this).attr('action');
			var event_master_id	= $('#event_master_id').val();
			
			$.ajax({  
				type: "POST",  
				url: action,  
				data: data_string,  
				success: function(data, status) {  
					form.html(data+'<br />'); 
					$('#budget_wrapper').load('/_components/events/subforms/budget.cmpnt.php?event_master_id='+event_master_id); 
				}  
			});
			
			return false;
		
		});
		
		$('.calc_field').blur(function(){
		
			var id		= $(this).attr('id');
			var type	= id.substring(0,id.indexOf('_'));
			
			calc_values(type);
			
		});
	
	});
</script>