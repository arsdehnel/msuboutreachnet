<%
	str_label_width = 150
%>
<link type="text/css" href="/css/frm_event_information.css" rel="stylesheet">
<script src="/functions/soc_sec_num.js"></script>
<table width="95%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="50%" colspan="2">
			<label for="first_name" style="width: <%=str_label_width%>px;">First Name:</label>
			<input type="text" style="width: <%=str_label_width%>px" name="first_name" value="<%=str_first_name%>">
		</td>
		<td width="50%" colspan="2">
			<label for="last_name" style="width: <%=str_label_width%>px;">Last Name:</label>
			<input type="text" style="width: <%=str_label_width%>px" name="last_name" value="<%=str_last_name%>">
		</td>
	</tr>
	<tr>
		<td width="50%" colspan="2">
			<label for="status_code" style="width: <%=str_label_width%>px;">Personnel Status:</label>
			<%
				custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=active_inactive'", "status_code", Null, str_status_code, Null, Null, Null, Null, "width: 150px", 1, Null
			%>
		</td>
		<td width="50%" colspan="2">
			<label for="title" style="width: <%=str_label_width%>px;">Personnel Title:</label>
			<input type="text" style="width: <%=str_label_width%>px" name="title" value="<%=str_title%>">
		</td>
	</tr>
	<tr>
		<td width="50%" colspan="2">
			<label for="type" style="width: <%=str_label_width%>px;">Personnel Type:</label>
			<%
				domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'personnel_type'", "domain_value_description", "type", "", str_type, "", "", "", "width: 150px;", 1, False, Null
			%>
		</td>
		<td width="50%" colspan="2">
			<label for="type" style="width: <%=str_label_width%>px;">Personnel Position:</label>
			<%
				domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'personnel_position'", "domain_value_description", "position", "", str_position, "", "", "", "width: 150px;", 1, False, Null
			%>
		</td>
	</tr>
	<tr>
		<td width="50%" colspan="2">
			<input type="hidden" name="ssn" value="<%=str_personnel_ssn%>">
		</td>
		<td width="50%" colspan="2" valign="top">
			<label for="personnel_w9" style="width: <%=str_label_width%>px;">W-9?</label><%
				custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "w9_ind", Null, str_w9_ind, Null, Null, Null, Null, "width: 100px", 1, Null
			%>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<label for="personnel_bio" style="width: <%=str_label_width%>px;">Biography:</label>
			<textarea name="biography" style="width: 568; height: 75px;"><%=str_personnel_bio%></textarea>
		</td>
	</tr>
</table>
