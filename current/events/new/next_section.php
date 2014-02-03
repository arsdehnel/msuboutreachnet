<!-- #include virtual="/functions/global.asp" -->
<%
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
	Set objComm = Server.CreateObject("ADODB.Command")
	Set objComm.ActiveConnection = objConn
	objComm.CommandText = "msuboutreachnet.prc_event_next_section_lookup"
	objComm.CommandType = &H0004
		
	objComm.Parameters.Append objComm.CreateParameter("@RETURN_VALUE", 3,4,0)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_rubric", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_number", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_quarter", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_semester", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_event_year", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_min_section_number", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_in_max_section_number", 200,1,10)
	objComm.Parameters.Append objComm.CreateParameter("@p_out_event_section", 200,3,10)

	objComm("@p_in_event_rubric") 		= validate_field(Request.QueryString("event_rubric"),"pl")
	objComm("@p_in_event_number")		= validate_field(Request.QueryString("event_number"),"pl")
	objComm("@p_in_event_quarter") 		= validate_field(Request.QueryString("event_quarter"),"pl")
	objComm("@p_in_event_semester") 	= validate_field(Request.QueryString("event_semester"),"pl")
	objComm("@p_in_event_year") 		= validate_field(Request.QueryString("event_year"),"pl")
	objComm("@p_in_min_section_number") = validate_field(Request.QueryString("min_section_number"),"pl")
	objComm("@p_in_max_section_number") = validate_field(Request.QueryString("max_section_number"),"pl")
	objComm("@p_out_event_section") 	= Null
  	
	objComm.Execute
	
	str_next_section = objComm("@p_out_event_section")
	
	Response.Write("<script language=""JavaScript"">")
	Response.Write("window.top.document.new_event_form.event_section.value = '" & str_next_section & "';")
	Response.Write("</script>")
%>