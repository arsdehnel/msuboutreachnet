<?	

	session_start();
	require_once('/home/www/pm_common/system.php');
	require_once('/home/www/pm_common/dao/msub/event_credits.dao.php');
	
	$ec_obj							= new dao_arsdehnel_msub_event_credits();

	if( $_GET['event_credit_id'] == 0 ){
		$ec_obj						-> event_credit_id		= 0;
		$ec_obj						-> event_master_id		= $_GET['event_master_id'];
		$ec_obj						-> status_code			= 'A';
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
		$ec_obj						-> event_credit_id		= $_GET['event_credit_id'];
		$ec_obj						-> retrieve(); 		
	}

?>
<form action="/process/event_forms/credits.php" method="post" name="event_credit_form" id="credit_form">
	<table border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td colspan="5">
				<label>Type: </label>
					<?
						prc_select_input( "SELECT domain_value_id
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'credit_type'", "type_id", null, $ec_obj->type_id, null, null, "[ Please select a credit type ]", null, 'width: 300px;', 1, 'type_id' );
					?><br />
			</td>
		</tr>
		<tr>
			<td style="width: 120px;"></td>
			<td style="font-size: 10px; font-weight: bold; text-align: center;">
				Per Unit Amount
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center;">
				Item
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center;">
				Quantity
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center;">
				Total Charge
			</td>
		</tr>
		<tr>
			<td>
				<label>Charge Details:</label>
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center; white-space: nowrap; padding: 0 2px;">
				$<input type="text" name="per_unit_amt" id="per_unit_amt" value="<?=$ec_obj->per_unit_amt;?>" style="width: 80px;">
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center; white-space: nowrap; padding: 0 2px;">
				/ <?
						prc_select_input( "SELECT domain_value_id
											 ,description
										   FROM arsdehnel_msub.vue_domain_value
										   WHERE domain_code = 'credit_items'", "per_unit_item_id", null, $ec_obj->per_unit_item_id, null, null, "[ Select Option ]", null, 'width: 100px;', 1, 'per_unit_item_id' );
				?><br />
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center; white-space: nowrap; padding: 0 2px;">
				x <input type="text" name="item_qty" id="item_qty" value="<?=$ec_obj->item_qty;?>" style="width: 50px;">
			</td>
			<td style="font-size: 10px; font-weight: bold; text-align: center; white-space: nowrap; padding: 0 2px;">
				= <input type="text" name="display_value" value="<?=$ec_obj->display_value;?>" disabled="disabled" style="width: 80px;" id="display_value">
			</td>
		</tr>
	</table>
	<label>Description: </label><input type="text" name="item_desc" value="<?=$ec_obj->item_desc;?>" style="width: 300px;"><br>
	<label>Primary Credit? </label>
		<?
			prc_select_input( "SELECT dv_code
								 ,description
							   FROM arsdehnel_msub.vue_domain_group_value
							   WHERE d_code = 'status_code'
							     AND dgm_code = 'yes_no'", "primary_ind", null, $ec_obj->primary_ind, null, null, null, null, 'width: 100px;', 1, 'primary_ind' );
		?><br />
	<label></label>
		<button type="submit" class="btn primary"><span><span>Save</span></span></button>
		<button type="button" class="btn modal_close"><span><span>Cancel</span></span></button>
	<input type="hidden" name="event_credit_id" value="<?=$ec_obj->event_credit_id;?>">
	<input type="hidden" name="event_master_id" id="event_master_id" value="<?=$ec_obj->event_master_id;?>">
	<input type="hidden" name="status_code" value="<?=$ec_obj->status_code;?>">
</form>
<script type="text/javascript">
	
	$(function(){
	
		$('#credit_form').submit(function(){
		
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
					$('#credits_wrapper').load('/_components/events/subforms/credits.cmpnt.php?event_master_id='+event_master_id); 
				}  
			});
			
			return false;
		
		});
		
		$('#item_qty, #per_unit_amt').change(function(){
		
			var item_qty		= $('#item_qty').val();
			var per_unit_amt	= $('#per_unit_amt').val();
			$('#display_value').val( item_qty * per_unit_amt );
		
		});
	
	});
</script>
<script language="JavaScript">
	function validate(){
	
		if(event_credit_form.quantity.value.length == 0){
			alert("Please enter a quantity.");
		}else if(event_credit_form.type_id.value.length == 0){
			alert("Please select a type.");
		}
		else{
			event_credit_form.submit();
		}
	
	}
</script>