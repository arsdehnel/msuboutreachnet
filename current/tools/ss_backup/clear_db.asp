<!-- #include virtual="/layout/_top.asp" -->
<h1>Access Backup Clear</h1>
<%
	'Drop all existing tables from backup.mdb
	Set objConn = Server.CreateObject("ADODB.Connection")
	objConn.Open "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\data\backup.mdb;"
	Dim oADOX
	Set oADOX = CreateObject("ADOX.Catalog")
	oADOX.ActiveConnection = objConn
	int_table_count = 0
	For Each oTable in oADOX.Tables
		If Left(UCase(oTable.Name),4) <> "MSYS" Then
			int_table_count = int_table_count + 1
			process_backup_sql "DROP TABLE [" & oTable.Name & "]", True
		End If
	Next
	objConn.Close
	Set objConn = nothing
	Session("success_line") = int_table_count & " tables removed."
	Response.Redirect("index.asp")
	
	Public Sub process_backup_sql( str_sql, bln_show_sql )
	
		Set process_sql_objConn = Server.CreateObject("ADODB.Connection")
		process_sql_objConn.Open "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=D:\Inetpub\wwwroot\msuboutreach.net\data\backup.mdb;"
		Set process_sql_objRS = Server.CreateObject("ADODB.Recordset")
		If bln_show_sql Then
			debug_line str_sql & "<br />"
		End If
		process_sql_objRS.Open str_sql, process_sql_objConn, 3, 3, &H0001		
		process_sql_objConn.Close
		Set process_sql_objConn = Nothing
			
	End Sub

%>
<!-- #include virtual="/layout/_bottom.asp" -->
