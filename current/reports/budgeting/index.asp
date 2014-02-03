<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">Budgeting Report</div>
<center>
	<form action="process.asp" method="post" name="frm_budgeting_report">
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
				<td width="50%" colspan="2">
					<label for="event_status" style="width: <%=str_label_width%>px;">Budget Item:</label><%
						domain_lov "qry_domain_group_values", "domain_group_detail_id", "group_description + ': ' + description", "domain_code = 'budget_items'", "group_description, description", "budget_item_id", "", Null, "", "", "All Budget Items", "width: 300px;", 12, 0, Null
					%><br>
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
		
		if(frm_budgeting_report.budget_item_id.value.length == 0){
			alert("Please select a budget item.");
		}
		else{
			document.frm_budgeting_report.submit();
		}
		
	}
</script>