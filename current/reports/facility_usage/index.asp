<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Facility Usage</div>
<center>
<form method="post" name="frm_facility_usage" action="process.asp">
	<table class="create_report_table" style="width: 800px;">
		<tr>
			<td class="rc_section_title" colspan="2">
				Dates:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="start_date" style="width: <%=str_label_width%>px;">Start date:</label><input type="text" class="datepicker" name="start_date" />
			</td>
			<td width="50%">
				<label for="end_date" style="width: <%=str_label_width%>px;">End date:</label><input type="text" class="datepicker" name="end_date" />
			</td>
		</tr>
		<tr>
			<td class="rc_section_title" colspan="2">
				Criteria:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="event_personnel" style="width: <%=str_label_width%>px;">Location:</label><%
					custom_ddlb "prc_lov_lookup 'DVIDG','domain_code=dtl_location&domain_group_master_code=downtown'", "location_id", Null, Null, Null, Null, "All locations", Null, "width: 200px", 12, Null
				%>
			</td>
			<td width="50%" valign="top">
				<label for="cancelled_courses" style="width: <%=str_label_width%>px;">Temporary Holds?</label><%
					custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "temporary_hold_ind", Null, "N", Null, Null, Null, Null, "width: 100px", 1, Null
				%><br />
				<label for="cancelled_courses" style="width: <%=str_label_width%>px;">Cancelled courses?</label><%
					custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "cancelled_ind", Null, "N", Null, Null, Null, Null, "width: 100px", 1, Null
				%>
			</td>
		</tr>
		<%
			action_box
		%>
	</table>
</form>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
<script language="JavaScript">
	function validate(){
		
		document.frm_facility_usage.submit();
		
	}
</script>