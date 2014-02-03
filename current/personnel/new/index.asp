<!-- #include virtual="/layout/_top.asp" -->
<div id="page_title">New Personnel</div>
<form action="process.asp" method="post">
	<table width="900" align="center">
		<tr>
			<td class="rc_section_title" colspan="2">
				Name:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="first_name" style="width: <%=str_label_width%>px;">First Name:</label>
				<input type="text" style="width: <%=str_label_width%>px" name="first_name" value="<%=str_first_name%>">
			</td>
			<td width="50%">
				<label for="last_name" style="width: <%=str_label_width%>px;">Last Name:</label>
				<input type="text" style="width: <%=str_label_width%>px" name="last_name" value="<%=str_last_name%>">
			</td>
		</tr>
		<tr>
			<td class="rc_section_title">
				Other Information:
			</td>
			<td class="rc_section_title">
				Biography:
			</td>
		</tr>
		<tr>
			<td width="50%">
				<label for="status_code" style="width: <%=str_label_width%>px;">Personnel Status:</label>
				<%
					custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=active_inactive'", "status_code", Null, str_status_code, Null, Null, Null, Null, "width: 150px", 1, Null
				%><br>
				<label for="type" style="width: <%=str_label_width%>px;">Personnel Type:</label><%
					domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'personnel_type'", "domain_value_description", "type", "", str_type, "", "", "", "width: 150px;", 1, 0, Null
				%><br>
				<label for="personnel_w9" style="width: <%=str_label_width%>px;">W-9?</label><%
				custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "w9_ind", Null, str_w9_ind, Null, Null, Null, Null, "width: 100px", 1, Null
			%>
			</td>
			<td align="center">
				<textarea name="personnel_bio" style="width: 100%; height: 75px;"><%=str_personnel_bio%></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center" id="buttons_box" style="margin-top: 0px;">
				<input type="submit" value="Save New Personnel">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset New Personnel">
				<input type="hidden" name="personnel_id" value="0">
				<input type="hidden" name="process_type" value="INSRT" />
				<input type="hidden" name="personnel_ssn" value="<%=str_personnel_ssn%>" />
			</td>
		</tr>
	</table>
</form>
<!-- #include virtual="/layout/_bottom.asp" -->