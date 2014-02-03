<%
	str_label_width = 150
%>
<link type="text/css" href="/css/frm_event_information.css" rel="stylesheet">
<label for="first_name" style="width: <%=str_label_width%>px;">Username:</label>
<input type="text" style="width: <%=str_label_width%>px" name="username" value="<%=str_username%>"><br>
<label for="last_name" style="width: <%=str_label_width%>px;">Password:</label>
<input type="password" style="width: <%=str_label_width%>px" name="password" value="<%=str_password%>"><br>
<label for="status_code" style="width: <%=str_label_width%>px;">Security Access:</label>
<%
	domain_lov "qry_domain_lov", "domain_value", "domain_value_description", "domain_code = 'security_levels' and domain_value_description <> '[ Unassigned ]'", "domain_value", "security_level", "", Cstr(int_security_level), "", "", "", "width: 150px;", 1, False, Null
%>