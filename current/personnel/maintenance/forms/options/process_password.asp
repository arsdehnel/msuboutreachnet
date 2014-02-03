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

	objComm("@p_in_process_type")	= "UPDPW"
	objComm("@p_in_personnel_id") 	= Session("user_id")
	objComm("@p_in_type") 			= Null
	objComm("@p_in_title") 			= Null
	objComm("@p_in_position") 		= Null
	objComm("@p_in_first_name") 	= Null
	objComm("@p_in_last_name") 		= Null
	objComm("@p_in_biography") 		= Null
	objComm("@p_in_ssn") 			= Null
	objComm("@p_in_w9_ind") 		= Null
	objComm("@p_in_status_code") 	= Null
	objComm("@p_in_username") 		= Null
	objComm("@p_in_password") 		= Null
	objComm("@p_in_security_level") = Null
	objComm("@p_variable_string") 	= "old_pwd=" & validate_field(Request.Form("old_pwd"),"pl") & "&new_pwd1=" & validate_field(Request.Form("new_pwd1"),"pl") & "&new_pwd2=" & validate_field(Request.Form("new_pwd2"),"pl")
	objComm("@p_in_log_user_id") 	= Session("user_id")
	
	'debug_line objComm("@p_variable_string") & "|" & Session("user_id")
  	
	objComm.Execute
	  	
	str_redirect = Null
	
	Select Case Cint(objComm("@RETURN_VALUE"))
	
		Case 0

			Session("success_line") = "Password updated successfully"
			str_redirect			= "iframe.asp"
			
		Case 1
			
			Session("error_line") 	= "The two new passwords entered do not match"
			str_redirect			= "form_password.asp"
			
		Case 2
			
			Session("error_line") 	= "The old password entered does not match the one stored in the database"
			str_redirect			= "form_password.asp"
			
	End Select
	
	Response.Redirect(str_redirect)	
			
%>