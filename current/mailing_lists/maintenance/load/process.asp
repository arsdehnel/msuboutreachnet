<!-- #include virtual="/functions/global.asp" -->
<%
	Server.ScriptTimeout = 3600

	int_mailing_list_id = Request.Form("mailing_list_id")

	ml_loadsql = "SELECT * FROM [" & Request.Form("worksheet_select") & "]" 
	Response.Write(ml_loadsql)
	Set ml_loadobjConn = Server.CreateObject("ADODB.Connection")
	ml_loadobjConn.Open "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\www\mailing_lists\maintenance\load\files\temp.xls;Extended Properties=""Excel 8.0; HDR=Yes; IMEX=1"""
	Set ml_loadobjRS = Server.CreateObject("ADODB.Recordset")
	ml_loadobjRS.Open ml_loadsql, ml_loadobjConn, 3, 3
	
		While Not ml_loadobjRS.EOF
			
			Set load_personnel_objConn = Server.CreateObject("ADODB.Connection")
			load_personnel_objConn.Open "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\data\the_adam.mdb;Jet OLEDB:Database Password=msuboutreach59101;"
Set load_personnel_objRS = Server.CreateObject("ADODB.Recordset")
			load_personnel_objRS.Open "tbl_personnel", load_personnel_objConn, 3, 3
			
			load_personnel_objRS.AddNew
			
				load_personnel_objRS.Fields("first_name")	= ml_loadobjRS("First Name")
				load_personnel_objRS.Fields("last_name")	= ml_loadobjRS("Last Name")
				load_personnel_objRS.Fields("type")	= "ML"
				load_personnel_objRS.Fields("status_code")	= "A"
				
				
			load_personnel_objRS.Update
			
			int_personnel_id = load_personnel_objRS("personnel_id")
			
			load_personnel_objRS.Close
			Set load_personnel_objRS = Nothing
			
	'		debug_line "test"

	'		debug_line ml_loadobjRS("Address Line 1")
	'		debug_line ml_loadobjRS("City")
	'		debug_line ml_loadobjRS("State")
	'		debug_line ml_loadobjRS("Postal Code")
			

			personnel_address_sql = "INSERT INTO tbl_personnel_addresses (personnel_id, address_title, address_line1, address_line2, address_line3, address_city, address_state, address_postal_code, address_primary) VALUES " & _
									"(" & int_personnel_id & ",""Mailing"",""" & ml_loadobjRS("Address Line 1") & """,""" & ml_loadobjRS("Address Line 2") & """,""" & ml_loadobjRS("Address Line 3") & """,""" & ml_loadobjRS("City") & """," & _
									"""" & ml_loadobjRS("State") & """,""" & ml_loadobjRS("Postal Code") & """,True)"
									
			'Response.Write(personnel_address_sql & "<br><br>")
			process_sql personnel_address_sql, True
			
			If Not IsEmpty(ml_loadobjRS("E-mail Address")) Then
				personnel_email_sql = "INSERT INTO tbl_personnel_emails (personnel_id, email_title, email_address, email_primary) VALUES (" & int_personnel_id & ",""Main"",""" & ml_loadobjRS("E-Mail Address") & """,True)"
				process_sql personnel_email_sql, True
			End If			
			
			mailing_list_personnel_sql = "INSERT INTO vtbl_mailing_list_personnel (mailing_list_id, personnel_id) VALUES (" & int_mailing_list_id & "," & int_personnel_id & ")"
			'Response.Write(mailing_list_personnel_sql & "<br><br>")
	'Response.Write(mailing_list_personnel_sql)
	'Response.End()
			process_sql mailing_list_personnel_sql, True
			
			'Response.Write("<hr>")
			
			load_personnel_objConn.Close
			Set load_personnel_objConn = Nothing
			
			int_personnel_count = int_personnel_count + 1
			
			ml_loadobjRS.MoveNext
		Wend
		
	Session("success_line") = Session("success_line") & "<br>" & int_personnel_count & " personnel successfully added to the mailing list."
	
	ml_loadobjRS.Close
	Set ml_loadobjRS = nothing
	ml_loadobjConn.Close
	Set ml_loadobjConn = nothing
	
	%>
	<script language="JavaScript">
	//window.location.reload( false );
	//var sURL = unescape(window.location.pathname);
	//alert(window.top.frames['sfrm_mailing_list_members'].location);
	window.top.frames['sfrm_mailing_list_members'].location.reload( true );
	window.top.frames['sfrm_mailing_list_load'].location.href="iframe.asp?mailing_list_id=<%=int_mailing_list_id%>";
	
	</script>
	<%
	
	'Response.Redirect("iframe.asp?mailing_list_id=" & int_mailing_list_id)
%>