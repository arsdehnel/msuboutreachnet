<!-- #include virtual="/functions/global.asp" -->
<%
	
	Set insert_mailing_list_objConn = Server.CreateObject("ADODB.Connection")
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_mailing_list_master_ins_upd"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_process_type", 200,1,5)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_mailing_list_master_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_title", 200,1,100)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_description", 200,1,2000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_status_code", 200,1,1)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_comments", 200,1,4000)
	objComm.Parameters.Append objComm.CreateParameter("@p_variable_string", 200,3,2000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_process_type") 			= validate_field(Request.Form("process_type"),"pl")
	objComm("@p_in_mailing_list_master_id") = validate_field(Request.Form("mailing_list_master_id"),"pl")
	objComm("@p_in_title") 					= validate_field(Request.Form("title"),"pl")
	objComm("@p_in_description") 			= validate_field(Request.Form("description"),"pl")
	objComm("@p_in_status_code")			= validate_field(Request.Form("status_code"),"pl")
	objComm("@p_in_comments") 				= validate_field(Request.Form("comments"),"pl")
	objComm("@p_variable_string") 			= Null
	objComm("@p_in_log_user_id") 			= Session("user_id")
  	
	objComm.Execute
	
	Response.Redirect("/mailing_lists/maintenance/index.asp?which=" & validate_field(Request.Form("mailing_list_master_id"),"pl"))
	
%>