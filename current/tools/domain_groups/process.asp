<!-- #include virtual="/functions/global.asp" -->
<%

	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_domain_group_detail_ins_upd"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_process_type", 200,1,5)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_domain_group_detail_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_domain_group_master_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_domain_value_id", 3,1,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_alias", 200,1,100)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_comments", 200,1,4000)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_log_user_id", 3,1,0)

	objComm("@p_in_process_type") 			= validate_field(Request.Form("process_type"),"pl")
	objComm("@p_in_domain_group_detail_id") = validate_field(Request.Form("domain_group_detail_id"),"pl")
	objComm("@p_in_domain_group_master_id") = validate_field(Request.Form("domain_group_master_id"),"pl")
	objComm("@p_in_domain_value_id") 		= validate_field(Request.Form("domain_value_id"),"pl")
	objComm("@p_in_alias") 					= validate_field(Request.Form("alias"),"pl")
	objComm("@p_in_comments") 				= validate_field(Request.Form("comments"),"pl")
	objComm("@p_in_log_user_id")			= Session("user_id")
  	
objComm.Execute
	Response.Redirect("index.asp?domain_group_master_id=" & Request.Form("domain_group_master_id"))
%>