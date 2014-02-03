<!-- #include virtual="/functions/global.asp" -->
<%
	arr_mailing_list_recordset = get_recordset( "prc_mailing_list_lookup 'FMLFM', " & validate_field(Request.QueryString("which"),"ip") & ",Null,Null,Null, Null" )

	'Basics
	int_mailing_list_master_id	= arr_mailing_list_recordset(0,0)
	str_title					= arr_mailing_list_recordset(1,0)
	str_description				= arr_mailing_list_recordset(2,0)
	str_status_code				= arr_mailing_list_recordset(3,0)
	str_comments				= arr_mailing_list_recordset(4,0)
	
%>