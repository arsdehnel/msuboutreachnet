<link type="text/css" href="/css/sfrm_event_information.css" rel="stylesheet">
<span style="margin: 5px 20px 5px 20px; text-align: left; display:block;">
	<label style="width: 100px;">Title:</label><input type="text" name="title" style="width: 600;" value="<%=str_title%>"><br />
	<label style="width: 100px;">Status:</label><%
		custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=active_inactive'", "status_code", Null, str_status_code, Null, Null, Null, Null, "width: 150px", 1, Null
	%><br />
	<label style="width: 100px;">Description:</label><textarea name="description" style="width: 600px; height: 200px;"><%=str_description%></textarea><br />
	<label style="width: 100px;">Comments:</label><textarea name="comments" style="width: 600px; height: 100px;"><%=str_comments%></textarea>
</span>