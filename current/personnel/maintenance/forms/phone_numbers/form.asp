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
		int_phone_id		= 0
		int_personnel_id		= Request.QueryString("personnel_id")
		str_phone_title			= "Main"
		str_phone_number		= "406"
		str_extension			= Null
		str_status_code			= "A"
		bln_phone_primary		= True
		str_process_type		= "INSRT"
		str_submit_button_text  = "Add Phone Number"
	Else
		arr_phone_recordset 	= get_recordset( "prc_personnel_phone_lookup 'FPHNE'," & validate_field(Request.QueryString("which"),"ip") & ",Null,Null" )
		int_phone_id			= arr_phone_recordset(0,0)
		int_personnel_id		= arr_phone_recordset(1,0)
		str_phone_title			= arr_phone_recordset(2,0)
		str_phone_number		= arr_phone_recordset(3,0)
		str_extension			= arr_phone_recordset(4,0)
		str_primary_ind			= arr_phone_recordset(5,0)		
		str_status_code			= arr_phone_recordset(6,0)
		str_process_type		= "UPDTE"
		str_submit_button_text 	= "Update Phone Number"
	End If
%>
<body>
<form action="/personnel/maintenance/forms/phone_numbers/process.asp" method="post" name="personnel_phone_number_maintenance">
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Title: </label><input type="text" name="title" value="<%=str_phone_title%>"><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Number: </label><input type="text" name="phone_number" id="phone_number" value="<%=str_phone_number%>" onKeyUp="/*this.value=*/stripAlphaChars(this.value);"><span id="phone_number_note" style="font-family: Arial, Helvetica, sans-serif; color: #000099; font-size: 12px; font-style: italic;"></span><br>
	<label for="event_recurrence" style="width: <%=int_label_width%>;">Extension: </label><input type="text" name="extension" value="<%=str_extension%>"><br>
	<label>Primary: </label><%
		custom_ddlb "prc_lov_lookup 'GPSTD','domain_code=status_code&domain_group_master_code=yes_no'", "primary_ind", Null, str_primary_ind, Null, Null, Null, Null, "width: 100px", 1, Null
	%><br>
	<label for="event_id" style="width: <%=int_label_width%>;"></label><input type="submit" value="<%=str_submit_button_text%>">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="document.location.href='/personnel/maintenance/forms/phone_numbers/iframe.asp?which=<%=int_personnel_id%>'">
	<input type="hidden" name="personnel_id" value="<%=int_personnel_id%>">
	<input type="hidden" name="phone_id" value="<%=int_phone_id%>"><br>
	<input type="hidden" name="process_type" value="<%=str_process_type%>" />
	<input type="hidden" name="status_code" value="<%=str_status_code%>" />
</form>
</body>