<!-- #include virtual="/functions/global.asp" -->
<%
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_personnel_ins_upd"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_process_type", 200,1,5)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_personnel_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_type", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_title", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_position", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_first_name", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_last_name", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_biography", 200,1,255)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_ssn", 200,1,9)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_w9_ind", 200,1,1)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_status_code", 200,1,1)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_username", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_password", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_security_level", 17,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_variable_string", 200,3,2000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_process_type")	= validate_field(Request.Form("process_type"),"pl")
	objComm("@p_in_personnel_id") 	= validate_field(Request.Form("personnel_id"),"pl")
	objComm("@p_in_type") 			= validate_field(Request.Form("type"),"pl")
	objComm("@p_in_title") 			= validate_field(Request.Form("title"),"pl")
	objComm("@p_in_position") 		= validate_field(Request.Form("position"),"pl")
	objComm("@p_in_first_name") 	= validate_field(Request.Form("first_name"),"pl")
	objComm("@p_in_last_name") 		= validate_field(Request.Form("last_name"),"pl")
	objComm("@p_in_biography") 		= validate_field(Request.Form("biography"),"pl")
	objComm("@p_in_ssn") 			= validate_field(Request.Form("ssn"),"pl")
	objComm("@p_in_w9_ind") 		= validate_field(Request.Form("w9_ind"),"pl")
	objComm("@p_in_status_code") 	= validate_field(Request.Form("status_code"),"pl")
	objComm("@p_in_username") 		= validate_field(Request.Form("username"),"pl")
	objComm("@p_in_password") 		= validate_field(Request.Form("password"),"pl")
	objComm("@p_in_security_level") = validate_field(Request.Form("security_level"),"pl")
	objComm("@p_variable_string") 	= Null
	objComm("@p_in_log_user_id") 	= Session("user_id")
  	
	objComm.Execute
	Response.Redirect("index.asp?which=" & Request.Form("personnel_id"))
%>