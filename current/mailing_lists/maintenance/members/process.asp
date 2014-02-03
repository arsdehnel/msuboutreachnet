<!-- #include virtual="/functions/global.asp" -->
<%
	int_personnel_id = get_first_value( "SELECT personnel_id FROM vtbl_mailing_list_personnel WHERE mailing_list_personnel_id = " & Request.Form("mailing_list_personnel_id") )

	Select Case Request.QueryString("which")
	
		Case "phone"

			If Request.Form("phone_id") = 0 Then
			
				sql = "INSERT INTO tbl_personnel_phones (personnel_id, phone_title, phone_number, phone_primary) VALUES (" & int_personnel_id & ",""" & Request.Form("phone_title") & """,""" & Request.Form("phone_number") & """," & validate_field(Request.Form("phone_primary"),"bln") & ")"
								
			Else
			
				sql = "UPDATE tbl_personnel_phones SET phone_title = """ & Request.Form("phone_title") & """, phone_number = """ & Request.Form("phone_number") & """, phone_primary = " & validate_field(Request.Form("phone_primary"),"bln") & " WHERE phone_id = " & Request.Form("phone_id")
							
			End If
			
			process_sql sql, True
			primary_check validate_field(Request.Form("phone_primary"),"bln"), "tbl_personnel_phones", "phone_primary", "phone_id", Request.Form("phone_id"), "personnel_id", int_personnel_id
			
		Case "email"
		
			If Request.Form("email_id") = 0 Then
			
				sql = "INSERT INTO tbl_personnel_emails (personnel_id, email_title, email_address, email_primary) VALUES (" & int_personnel_id & ",""" & Request.Form("email_title") & """,""" & Request.Form("email_address") & """," & validate_field(Request.Form("email_primary"),"bln") & ")"
				Response.Write("test")
								
			Else
			
				sql = "UPDATE tbl_personnel_emails SET email_title = """ & Request.Form("email_title") & """, email_address = """ & Request.Form("email_address") & """, email_primary = " & validate_field(Request.Form("email_primary"),"bln") & " WHERE email_id = " & Request.Form("email_id")
				Response.Write("test2")
				
			End If
			
			process_sql sql, True
			primary_check validate_field(Request.Form("email_primary"),"bln"), "tbl_personnel_emails", "email_primary", "email_id", Request.Form("email_id"), "personnel_id", int_personnel_id
			
		Case "address"
		
			If Request.Form("address_id") = 0 Then
			
				sql = "INSERT INTO tbl_personnel_addresses (personnel_id, address_title, address_line1, address_line2, address_line3, address_city, address_state, address_postal_code, address_primary) VALUES (" & int_personnel_id & ",""" & Request.Form("address_title") & """,""" & Request.Form("address_line1") & """,""" & Request.Form("address_line2") & """,""" & Request.Form("address_line3") & """,""" & Request.Form("address_city") & """,""" & Request.Form("address_state") & """,""" & Request.Form("address_postal_code") & """," & validate_field(Request.Form("address_primary"),"bln") & ")"
								
			Else
			
				sql = "UPDATE tbl_personnel_addresses SET address_title = """ & Request.Form("address_title") & """, address_line1 = """ & Request.Form("address_line1") & """, address_line2 = """ & Request.Form("address_line2") & """, address_line3 = """ & Request.Form("address_line3") & """, address_city = """ & Request.Form("address_city") & """, address_state = """ & Request.Form("address_state") & """, address_postal_code = """ & Request.Form("address_postal_code") & """, address_primary = " & validate_field(Request.Form("address_primary"),"bln") & " WHERE address_id = " & Request.Form("address_id")
				
			End If
			
			process_sql sql, True
			primary_check validate_field(Request.Form("address_primary"),"bln"), "tbl_personnel_addresses", "address_primary", "address_id", Request.Form("address_id"), "personnel_id", int_personnel_id
			
	End Select
	Response.Write(Request.QueryString)
	
	Response.Redirect("form.asp?which=" & Request.Form("mailing_list_personnel_id"))
	
%>