<?
	switch( $_GET['rec_type'] ){
	
		case "event_budget":
		
			$confirm_msg 	= "Are you sure you want to remove this budget entry?";
			$id_field		= "event_budget_id";
			$id				= $_GET['event_budget_id'];
			break;

		case "event_personnel":
		
			$confirm_msg	= "Are you sure you want to remove this personnel?";
			$id_field		= "event_personnel_id";
			$id				= $_GET['event_personnel_id'];
			break;
	
		case "event_dtl":
		
			$confirm_msg	= "Are you sure you want to remove this date, time and location entry?";
			$id_field		= "event_dtl_id";
			$id				= $_GET['event_dtl_id'];
			break;

	}
?>
<form action="/process/remove.php" method="post" name="confirm_form" id="confirm_form">
	<div><?=$confirm_msg;?></div>
	<input type="hidden" name="rec_type" value="<?=$_GET['rec_type'];?>" />
	<input type="hidden" name="id_field" value="<?=$id_field;?>" />
	<input type="hidden" name="id" value="<?=$id;?>" />
	<div style="text-align: center; margin-top: 12px;">
		<button type="submit" class="btn"><span><span>Yes</span></span></button><button type="button" class="btn modal_close"><span><span>No</span></span></button>
	</button>
</form>
<script type="text/javascript">

	$(function(){
	
		$('form').submit(function(){
			var dataString 	= $(this).serialize();
			var action		= $(this).attr('action');
			var method		= $(this).attr('method');
			$.ajax({
				type: method,
				url: action,
				data:  dataString,
				success: function(data){
					if( data == '0' ){
						$('#modal_close').trigger('click');
						window.location.reload();
					}else{
						alert( data );
					}
				}//success
			});//ajax call
			return false;
		});	
			
	});
	
</script>