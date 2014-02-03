<!-- #include virtual="/functions/global.asp" -->
<link rel="stylesheet" type="text/css" href="/css/texts.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<link rel="stylesheet" type="text/css" href="/css/forms.css">
<style type="text/css">
label{
	width: 120px;
}
</style>
<%	
	
	If Request.QueryString("which") = 0 Then
		int_address_id		= 0
		int_personnel_id		= Request.QueryString("personnel_id")
		str_submit_button_text = "Add Postal Address"
		str_address_title		= "Main"
		str_address_line1		= ""
		str_address_line2		= ""
		str_address_line3		= ""
		str_address_city		= ""
		str_address_state		= ""
		str_address_postal_code	= ""
		str_primary_ind			= "Y"
		str_process_type		= "INSRT"
	Else
		arr_address_recordset 	= get_recordset( "prc_personnel_address_lookup 'FPSTL'," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null" )
		int_address_id			= arr_address_recordset(0,0)
		int_personnel_id		= arr_address_recordset(1,0)
		str_address_title		= arr_address_recordset(2,0)
		str_address_line1		= arr_address_recordset(3,0)
		str_address_line2		= arr_address_recordset(4,0)
		str_address_line3		= arr_address_recordset(5,0)
		str_address_city		= arr_address_recordset(6,0)
		str_address_state		= arr_address_recordset(7,0)
		str_address_postal_code	= arr_address_recordset(8,0)
		str_primary_ind			= arr_address_recordset(9,0)
		str_process_type		= "UPDTE"
		str_submit_button_text 	= "Update Postal Address"
	End If
%>
<body>
<form action="/personnel/maintenance/forms/postal_addresses/process.asp" method="post" name="personnel_postal_address_maintenance">
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Title: </label><input type="text" name="title" value="<%=str_address_title%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Line 1: </label><input type="text" name="addr_1" value="<%=str_address_line1%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Line 2: </label><input type="text" name="addr_2" value="<%=str_address_line2%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Line 3: </label><input type="text" name="addr_3" value="<%=str_address_line3%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">City: </label><input type="text" name="city" value="<%=str_address_city%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">State: </label><%
		custom_ddlb "prc_lov_lookup 'DVSTD','domain_code=state_abbr'", "state", Null, str_address_state, Null, Null, Null, Null, "width: 100px", 1, Null
	%><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Postal Code: </label><input type="text" name="postal_code" value="<%=str_address_postal_code%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Primary: </label><%
		custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "primary_ind", Null, str_primary_ind, Null, Null, Null, Null, "width: 100px", 1, Null
	%><br>
	<label for="event_id" style="width: <%=int_label_width%>;"></label><input type="submit" value="<%=str_submit_button_text%>">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="document.location.href='/personnel/maintenance/forms/postal_addresses/iframe.asp?which=<%=int_personnel_id%>'">
	<input type="hidden" name="personnel_id" value="<%=int_personnel_id%>">
	<input type="hidden" name="address_id" value="<%=int_address_id%>"><br>
	<input type="hidden" name="process_type" value="<%=str_process_type%>" />
</form>
</body>