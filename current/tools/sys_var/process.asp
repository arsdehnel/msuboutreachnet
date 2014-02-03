<!-- #include virtual="/layout/_top.asp" -->
<%

	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_sys_var_ins_upd"
	objComm.CommandType = &H0004
	
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_process_type", 200,1,5)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_sys_var_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_type", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_code", 200,1,50)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_value", 200,1,200)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_status_code", 200,1,1)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_comments", 200,1,4000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_process_type") 	= validate_field(Request.Form("process_type"),"pl")
	objComm("@p_in_sys_var_id") 	= validate_field(Request.Form("sys_var_id"),"pl")
	objComm("@p_in_type") 			= validate_field(Request.Form("type"),"pl")
	objComm("@p_in_code") 			= validate_field(Request.Form("code"),"pl")
	objComm("@p_in_value") 			= validate_field(Request.Form("value"),"pl")
	objComm("@p_in_status_code") 	= validate_field(Request.Form("status_code"),"pl")
	objComm("@p_in_comments") 		= validate_field(Request.Form("comments"),"pl")
	objComm("@p_in_log_user_id") 	= Session("user_id")

	objComm.Execute
	  	
	Response.Redirect("index.asp?sys_var_type=" & Request.Form("type"))
%>
<!-- #include virtual="/layout/_bottom.asp" -->
