		Case "duplicate_personnel"
			Response.Write("<div id=""iframe_page_title"">Duplicated Personnel</div>")
			If Request.QueryString("which") = "" Then
				Response.Write("<div>Select personnel record to combine with another, this record will be removed once merge is complete.</div>")
			Else
				Response.Write("<div>Select personnel record to combine the highlighted record into, this record will be attached to all events currently attached to highlighted record.</div>")
			End If
			
			If Request.Form("field_select") = "" and Request.QueryString("field_select") <> "" Then
				str_field_select = Request.QueryString("field_select")
			Else
				str_field_select = Request.Form("field_select")
			End If			
						
			sql = "SELECT tbl_personnel.personnel_id as [ID], type & ': ' & title as [Title], last_name & ', ' & first_name as [Name], status_code as [Status], address_line1 & '<br>' & address_city & ', ' & address_state & ' ' & address_postal_code as [Address], email_address as [E-mail Address], phone_number as [Phone] FROM personnel_profile WHERE " & str_field_select & " In (SELECT [" & str_field_select & "] FROM [tbl_personnel] As Tmp GROUP BY [" & str_field_select & "] HAVING Count(*)>1 ) ORDER BY " & str_field_select
			
			Dim arr_result_actions(0,2)
			
			If Request.QueryString("which") = "" Then
				arr_result_actions(0,0) = "/tools/cleanup/process.asp?report_type=" & str_report_type & "&field_select=" & str_field_select & "&" & Request.QueryString
				arr_result_actions(0,1) = "Start Merge"
				arr_result_actions(0,2) = "_self"
			Else
				arr_result_actions(0,0) = "/tools/cleanup/process.asp?report_type=" & str_report_type & "_complete&from_personnel_id=" & Request.QueryString("which") & "&"
				arr_result_actions(0,1) = "Complete Merge"
				arr_result_actions(0,2) = "_self"
			End If
			
			data_grid sql, True, arr_result_actions, 0, False, 0, False, CInt(Request.QueryString("which")), "background-color: #CCCCCC; font-weight: bold;", "No duplicate personnel by the field you selected", False, 0, False, False, Null, Null

		Case "duplicate_personnel_complete"
		
			event_personnel_sql		= "UPDATE tbl_event_personnel SET personnel_id = " & Request.QueryString("which") & " WHERE personnel_id = " & Request.QueryString("from_personnel_id")
			personnel_sql			= "DELETE FROM tbl_personnel WHERE personnel_id = " & Request.QueryString("from_personnel_id")
			personnel_address_sql	= "DELETE FROM tbl_personnel_addresses WHERE personnel_id = " & Request.QueryString("from_personnel_id")
			personnel_email_sql		= "DELETE FROM tbl_personnel_emails WHERE personnel_id = " & Request.QueryString("from_personnel_id")
			personnel_phone_sql		= "DELETE FROM tbl_personnel_phones WHERE personnel_id = " & Request.QueryString("from_personnel_id")
			
			
			Response.Redirect("iframe.asp?domain_value=duplicate_personnel")
