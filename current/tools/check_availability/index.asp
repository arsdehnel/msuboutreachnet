<!-- #include virtual="/layout/_top.asp" -->
<%
	If Request.Form("event_date") = "" Then
		dtm_current_date = Date
	Else
		dtm_current_date = Request.Form("event_date")
	End If
%>
<div id="page_title">Check Downtown Room Availability</div><br>
<center>
	<form action="index.asp" name="frm_check_availability" style="width: 800px;" method="post" onsubmit="return validate();">
		<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td>
					<label for="check_availability_date">Select Date:</label><input type="text" class="datepicker" name="event_date" value="<%=dtm_current_date%>" />
				</td>
				<td>
					<label for="check_availability_location">Select Room:</label><%
						custom_ddlb "prc_lov_lookup 'DVIDG','domain_code=dtl_location&domain_group_master_code=downtown'", "location_id", Null, CInt(Request.Form("location_id")), Null, Null, Null, Null, "width: 300px", 1, Null
					%>
				</td>
			</tr>
			<tr>
				<td colspan="8" align="center">
					<br>
					<input type="submit" value="Check Availability">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset Criteria">
					<input type="hidden" name="query" value="Y">
				<br><br>
				</td>
			</tr>
		</table>
	</form>
	<%
		If Request.Form("query") = "Y" Then
		
			Dim arr_result_actions(0,3,0)
			
			arr_result_actions(0,0,0) = "/events/maintenance/index.asp?"
			arr_result_actions(0,1,0) = "View"
			arr_result_actions(0,2,0) = "_top"
			arr_result_actions(0,3,0) = Null
				
			data_grid "tool_check_availability " & validate_field(Request.Form("location_id"),"ip") & "," & validate_field(Request.Form("event_date"),"ip"), True, arr_result_actions, 0, False, 0, False, Null, Null, False, Null, Null, False, "No matches for selected date and location", False, 0, False, False, "std_dg", Null
						
		End If
	%>
</center>	
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="javascript">

function validate(){
	var dt=document.frm_check_availability.event_date
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    return true
 }
 
</script>