<!-- #include virtual="/layout/_top.asp" -->
<form action="process.asp" method="post" class="css_form" name="backup_form">
	<label style="width: 200px;">Select Table to Backup:</label><select name="table_name"><option value="">[ Please select a table ]</option>
	<%
		Set ss_objConn = Server.CreateObject("ADODB.Connection")
		ss_objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
		Dim adox_ss
		Set adox_ss = CreateObject("ADOX.Catalog")
		adox_ss.ActiveConnection = ss_objConn
		For Each ss_table in adox_ss.Tables
			If ss_table.Type = "TABLE" Then
				Response.Write("<option value=""" & ss_table.Name & """>" & ss_table.Name & "</option>")
			End If		
		Next
		ss_objConn.Close
		Set ss_objConn = nothing
	
	%></select>
	<a href="#" onclick="backup_form.submit();">Backup Selected Table</a><a href="clear_db.asp">Clear Backup Table</a>
<!-- #include virtual="/layout/_bottom.asp" -->