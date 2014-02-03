<!-- #include virtual="/layout/_top.asp" -->
<style type="text/css">
#personnel_frame{
	width: 350px;
	height: 80px;
	border: 0px;
	display: none;
} 
#success_line{
	display: none;
	padding: 2px 3px 3px 3px;
	color: #333399;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	font-size: 10px;
}
</style>
<div id="page_title">Hold a Room</div>
<form action="/events/hold/process.asp" method="post" name="hold_room_form" class="form_large">
		<table border="0" cellpadding="4" cellspacing="4">
			<tr>
				<td>
					<label>Title:</label>
					<input type="text" name="event_title" value="" style="width: 250px;">
				</td>
				<td width="50%" rowspan="6" valign="top">
					<label for="event_status" style="display: block">Current Dates:</label>
					<iframe style="width: 100%; height: 220px; border: 1ps solid #000066;" frameborder="0" src="/events/maintenance/forms/dtl/iframe.asp?which=<%=Session.SessionID%>" name="hold_room_dtl"></iframe>
					<button type="button" onClick="hold_room_dtl.location.href='/events/maintenance/forms/dtl/form.asp?dtl=0&event_id=<%=Session.SessionID%>'" class="btn" style="float: right; margin: 4px;"><span><span>Add New Date, Time & Location</span></span></button>
				</td>
			</tr>
			<tr>
				<td>
					<label for="event_status">Status:</label>
					<input type="text" name="event_status" value="TH" style="width: 75px;" disabled="disabled">
					<input type="hidden" name="event_status" value="TH">
				</td>
			</tr>
			<tr>
				<td>
					<label for="event_crn">Contact:</label><%
						custom_ddlb "prc_lov_lookup 'PSNLA','type=EX'", "personnel_id", Null, int_personnel_id, Null, Null, "[ Please select a personnel ]", Null, "width: 300px;", 1, "personnel_select"
					%><button type="button" class="btn modal" href="/events/hold/contact/form.asp" style="float: right; margin: 3px 37px 0 0;"><span><span>Add New Contact</span></span></button>
					<span id="success_line"></span>
				</td>
			</tr>
			<tr>
				<td>
					<label for="event_crn">Staff:</label><%
						custom_ddlb "prc_lov_lookup 'PSNLA','type=EX'", "internal_staff_id", Null, int_personnel_id, Null, Null, "[ Please select a personnel ]", Null, "width: 300px;", 1, Null
					%>
				</td>
			</tr>
			<tr>
				<td align="center">
					<iframe name="personnel_frame" id="personnel_frame" frameborder="0" scrolling="no"></iframe>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<label for="event_crn">Notes:</label><textarea name="event_remarks" style="width: 300px; height: 128px;"><%=mem_event_remarks%></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button type="button" onClick="validate();" class="btn"><span><span>Save Room Hold</span></span></button>
					<button type="reset" class="btn"><span><span>Reset Room Hold</span></span></button>
				</td>
			</tr>
			<tr>
				<td align="center">
					<iframe name="calendar_frame" id="calendar_frame" frameborder="0" scrolling="no"></iframe>
				</td>
			</tr>
		</table>			
	</form>
<script language="javascript">

	function validate(){
	
		if(hold_room_form.personnel_id.value.length == 0){
			//alert(hold_room_form.personnel_id.value);
			alert("Please select a personnel.");
		}else if(hold_room_form.internal_staff_id.value.length == 0){
			//alert(hold_room_form.personnel_id.value);
			alert("Please select a staff member.");
		}else{
			hold_room_form.submit();
		}
	
	}

</script>
<!-- #include virtual="/layout/_bottom.asp" -->