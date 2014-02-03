<%
	Dim mySmartUpload
	Dim file
	Dim intCount
	intCount = 0
	badfile = 0
	Server.ScriptTimeout = 1200

	Set mySmartUpload = Server.CreateObject("aspSmartUpload.SmartUpload")

	'Response.Write("test")
	'Response.End()
	mySmartUpload.Upload
	For each item In mySmartUpload.Form
		For each value In mySmartUpload.Form(item)
			int_mailing_list_id = value
			'Response.Write(item & "=" & value & "<BR>")
		Next
	Next
	
	For each file In mySmartUpload.Files
		str_file_name = file.FileName
		If not file.IsMissing Then
			If not UCase(file.FileExt) = "XLS" Then
				Session("error_line") = "<u>" & str_file_name & "</u> is not an Excel file, it has not been loaded to the database."
				Response.redirect("iframe.asp")
			End If
				'Response.Write("test2")
				str_path = Server.MapPath("\mailing_lists\maintenance\load\files\") & "\temp.xls"
				'Response.Write(str_path)
				file.SaveAs(str_path)
				Session("success_line") = "<u>" & str_file_name & "</u> uploaded successfully."
				'Response.redirect("confirm.asp?mailing_list_id=" & int_mailing_list_id)
		End If
	Next
	
	Response.Redirect("select_worksheet.asp?mailing_list_id=" & int_mailing_list_id)
%>