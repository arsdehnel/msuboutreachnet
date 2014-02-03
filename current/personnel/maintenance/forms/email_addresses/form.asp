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
		int_email_id			= 0
		int_personnel_id		= Request.QueryString("personnel_id")
		str_submit_button_text 	= "Add E-mail Address"
		str_email_title			= "Main"
		str_email_address		= "username@domain.com"
		str_primary_ind			= "Y"
		str_process_type		= "INSRT"
	Else
		arr_email_recordset 	= get_recordset( "prc_personnel_email_lookup 'FEMAL'," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null" )
		int_email_id			= arr_email_recordset(0,0)
		int_personnel_id		= arr_email_recordset(1,0)
		str_email_title			= arr_email_recordset(2,0)
		str_email_address		= arr_email_recordset(3,0)
		str_primary_ind			= arr_email_recordset(4,0)
		str_submit_button_text 	= "Update E-mail Address"
		str_process_type		= "UPDTE"
	End If
%>
<body>
<form action="/personnel/maintenance/forms/email_addresses/process.asp" method="post" name="personnel_email_address_maintenance">
	<label>Title: </label><input type="text" name="title" value="<%=str_email_title%>"><br>
	<label>Address: </label><input type="text" name="address" value="<%=str_email_address%>"><br>
	<label>Primary: </label><%
		custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "primary_ind", Null, str_primary_ind, Null, Null, Null, Null, "width: 100px", 1, Null
	%><br>
	<label></label><input type="submit" value="<%=str_submit_button_text%>">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="document.location.href='/personnel/maintenance/forms/email_addresses/iframe.asp?which=<%=int_personnel_id%>'">
	<input type="hidden" name="personnel_id" value="<%=int_personnel_id%>">
	<input type="hidden" name="email_id" value="<%=int_email_id%>"><br>
	<input type="hidden" name="process_type" value="<%=str_process_type%>"><br>
</form>
</body>