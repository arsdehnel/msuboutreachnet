<!-- #include virtual="/functions/global.asp" -->
<%
	arr_personnel_recordset = get_recordset( "prc_personnel_lookup 'FPSNL', " & validate_field(Request.QueryString("which"),"ip") & ",Null,Null,Null, Null" )
	  
	  
	int_personnel_id 		= arr_personnel_recordset(0,0)
	str_type				= arr_personnel_recordset(1,0)
	str_title				= arr_personnel_recordset(2,0)
	str_position			= arr_personnel_recordset(3,0)
	str_first_name			= arr_personnel_recordset(4,0)
	str_last_name			= arr_personnel_recordset(5,0)
	str_personnel_bio		= arr_personnel_recordset(6,0)
	str_personnel_ssn		= arr_personnel_recordset(7,0)
	str_w9_ind				= arr_personnel_recordset(16,0)
	str_status_code			= arr_personnel_recordset(8,0)
	str_username			= arr_personnel_recordset(9,0)
	str_password			= arr_personnel_recordset(10,0)
	int_security_level		= arr_personnel_recordset(11,0)
	
	str_fullname			= str_first_name & " " & str_last_name
	
%>