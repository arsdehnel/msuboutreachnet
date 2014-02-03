<%
	Response.Buffer = False
	
	Server.ScriptTimeout = 1200
	
	report_header "Outcomes Report", Request.Form("action_select")
	
	If Request.Form("report_type") = "BGTSM" Then
		int_colspan_size = 8
	Elseif Request.Form("report_type") = "EVPSM" Then
		int_colspan_size = 7
	End If
	
	Set dct_colspan_dtl = Server.CreateObject("Scripting.Dictionary")
	dct_colspan_dtl.Add "HD",int_colspan_size
	dct_colspan_dtl.Add "FT",2
	dct_colspan_dtl.Add "DTL",Null
		
	str_sql = "rpt_outcomes " & Session.SessionID _
				& ", " & validate_field(Request.Form("report_type"),"ip") _
				& ", " & validate_field(Request.Form("start_date"),"ip") _
				& ", " & validate_field(Request.Form("end_date"),"ip") _
				& ", " & validate_field(Request.Form("event_year"),"ip") _
				& ", " & validate_field(Request.Form("event_quarter"),"ip") _
				& ", " & validate_field(Request.Form("event_rubric"),"ip") _
				& ", " & validate_field(Request.Form("event_status"),"ip") _
				& ", " & validate_field(Request.Form("event_type"),"ip") _
				& ", " & validate_field(Request.Form("event_coordinator"),"ip") _
				& ", " & validate_field(Request.Form("location_group"),"ip") _
				& ", " & validate_field(Request.Form("location_id"),"ip") _
				& ", " & validate_field(Request.Form("gb_1_field"),"ip") _
				& ", " & validate_field(Request.Form("gb_2_field"),"ip") _
				& ", " & validate_field(Request.Form("gb_3_field"),"ip") _
				& ", " & validate_field(Request.Form("gb_4_field"),"ip") _
				& ", " & validate_field(Request.Form("ob_1_field"),"ip") _
				& ", " & validate_field(Request.Form("ob_1_dir"),"ip") _
				& ", " & validate_field(Request.Form("ob_2_field"),"ip") _
				& ", " & validate_field(Request.Form("ob_2_dir"),"ip") _
				& ", " & validate_field(Request.Form("ob_3_field"),"ip") _
				& ", " & validate_field(Request.Form("ob_3_dir"),"ip") _
				& ", " & validate_field(Request.Form("ob_4_field"),"ip") _
				& ", " & validate_field(Request.Form("ob_4_dir"),"ip") _
				& ", 'Y', " & Session("user_id")

	data_grid_outcomes str_sql, True, Null, 0, False, 1, False, Null, Null, False, Null, Null, False, 1, False, 0, 3, 2, "No records for the requested report.", False, 0, False, False, Null, Null
  	
	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->
<%
	Public Sub data_grid_outcomes( str_sql, bln_header_row, arr_actions, int_id_field, bln_show_id_field, int_cond_field, bln_show_cond_field, var_cond_value, str_cond_style, bln_alternate_style, str_alternate_style, int_action_grp_field, bln_show_action_grp_field, int_class_field, bln_show_class_field, int_rec_type_field, int_colspan_field, int_colspan_padding, str_no_records_text, bln_display_sql, int_records_per_page, bln_header_navigation, bln_footer_navigation, str_table_class, str_table_style_text )
	
		If bln_display_sql Then
			Response.Write("<div><strong>SQL:</strong>&nbsp;" & str_sql & "</div><hr color=""#000066"" noshade>")
		End If
		
		'debug_line str_sql

		Set dg_objConn = Server.CreateObject("ADODB.Connection")
		dg_objConn.Open "PROVIDER=SQLOLEDB;DATA SOURCE=209.133.228.174;UID=msuboutreachnet;PWD=3a4d7a2m;DATABASE=msuboutreachnet;"
		Set dg_objRS = Server.CreateObject("ADODB.Recordset")
		
		'Response.Write(str_sql)
		
		dg_objRS.Open str_sql, dg_objConn, 0, 1

		If dg_objRS.EOF Then
			Response.Write("<div class=""no_records_box"">" & str_no_records_text & "</div>")
			bln_results = False
		Else
			dg_recordset 		= dg_objRS.GetRows()
			int_rec_first   	= LBound(dg_recordset, 2)
			int_rec_last    	= UBound(dg_recordset, 2)
			If int_records_per_page > 0 and (bln_footer_navigation or bln_header_navigation) Then
				int_total_records	= (int_rec_last - int_rec_first) + 1
				int_total_pages		= round_up(int_total_records / int_records_per_page)
				int_page_number 	= CInt(Request.QueryString("page"))
				If int_page_number = 0 Then
					str_query_string = Request.QueryString
					'Response.Write("|" & int_page_number & "|<br>")
					int_page_number = 1
				Else
					str_query_string = Mid(Request.QueryString, InStr(1, Request.QueryString, "&", 1) + 1)
				End If
				str_page_navigation = paged_navigation(int_page_number, int_total_pages, str_query_string, Request.ServerVariables("URL"))
				int_rec_first 	= int_rec_first + ((int_page_number - 1) * int_records_per_page)
				If Not int_page_number = int_total_pages Then
					int_rec_last	= int_rec_first + (int_records_per_page - 1)
				End If
			End If
			int_field_first 	= LBound(dg_recordset, 1)
			int_field_last		= UBound(dg_recordset, 1)
			bln_results 		= True
			'Response.Write(int_total_records & "<hr>")
			'Response.Write(int_total_pages & "<hr>")
			'Response.Write(int_page_number & "<hr>")
			'Response.Write(str_query_string & "<hr>")
			'Response.Write(int_rec_first & " - " & int_rec_last & "<hr>")
		End If

		dg_objRS.Close
		Set dg_objRS = nothing
		dg_objConn.Close
		Set dg_objConn = nothing
							
		If bln_results Then
			If bln_header_navigation and int_total_pages > 1 Then
				Response.Write(str_page_navigation)
			End If
			%>
			<link rel="stylesheet" type="text/css" href="/css/data_grid_outcomes.css" media="screen">
			<link rel="stylesheet" type="text/css" href="/css/data_grid_outcomes_p.css" media="print">
			<table width="95%" border="1" cellpadding="2" cellspacing="0" align="center" class="<%=str_table_class%>" style="<%=str_table_style_text%>">
				<%
				If bln_header_row Then
					arr_field_names = get_field_names( str_sql )
					%>
					<tr>
						<%
						For i = Lbound(arr_field_names) to (ubound(arr_field_names) - 1)
							If (i <> int_id_field and i <> int_cond_field) or (i = int_id_field and bln_show_id_field) or (i = int_cond_field and bln_show_cond_field) Then
								Response.Write("<th>" & arr_field_names(i) & "</th>")
							End If
						Next
						If IsArray(arr_actions) Then
							%>
							<th class="no_print">
								Actions								
							</th>
							<%
						End If
					%>
					</tr>
					<%
				End If
				bln_alternate_format = True
				For i = int_rec_first to int_rec_last
					If dg_recordset(int_cond_field,i) = var_cond_value Then
						str_style = " style=""" & str_cond_style & """"
						bln_alternate_format = True
					Elseif Not bln_alternate_format and bln_alternate_style Then
						str_style = " style=""" & str_alternate_style & """"
						bln_alternate_format = True
					Else
						str_style = Null
						bln_alternate_format = False
					End If	
					If Not IsNull(int_class_field) Then
						str_class = " class=""" & dg_recordset(int_class_field,i) & """"
					Else
						str_class = Null
					End If
					Response.Write("<tr>")
					If IsNull(int_rec_type_field) or IsNull(dct_colspan_dtl.item(dg_recordset(int_rec_type_field,i))) Then
						For j = int_field_first to int_field_last
							If (j <> int_id_field and j <> int_cond_field) or (j = int_id_field and bln_show_id_field) or (j = int_cond_field and bln_show_cond_field) or (j = int_class_field and bln_show_class_field) Then
								If Len(dg_recordset(j,i)) > 0 Then
									Response.Write("<td" & str_style & str_class & ">" & dg_recordset(j,i) & "</td>")
								Else
									Response.Write("<td" & str_style & str_class & ">&nbsp;</td>")
								End If
							End If
						Next
						If IsArray(arr_actions) Then
							If Not IsNull(int_action_grp_field) Then
								int_first_action_grp	= Lbound(arr_actions, 3)
								int_last_action_grp		= Ubound(arr_actions, 3)
								For int_curr_action_grp = int_first_action_grp to int_last_action_grp
									If dg_recordset(int_action_grp_field,i) = int_curr_action_grp Then
										With Response
											int_rec_first   = LBound(arr_actions, 1)
											int_rec_last    = UBound(arr_actions, 1)
											.Write("<td class=""actions_box no_print"" align=""center""" & str_style & "><nobr>")
											For k = int_rec_first to int_rec_last
												If Len(arr_actions(k,1,int_curr_action_grp)) > 0 Then
													.Write("<a href=""" & arr_actions(k,0,int_curr_action_grp) & "which=" & dg_recordset(int_id_field,i) & """ target=""" & arr_actions(k,2,int_curr_action_grp) & """")
													If Not IsNull(arr_actions(k,3,int_curr_action_grp)) Then
														.Write(" onclick=""" & arr_actions(k,3,int_curr_action_grp) & dg_recordset(int_id_field,i) & "'""")
													End If
													.Write(">" & arr_actions(k,1,int_curr_action_grp) & "</a>")
												End If
											Next
											.Write("</nobr></td>")
										End With
									End If
								Next
							Else
								With Response
									int_rec_first   = LBound(arr_actions, 1)
									int_rec_last    = UBound(arr_actions, 1)
									.Write("<td class=""actions_box no_print"" align=""center""" & str_style & "><nobr>")
									For k = int_rec_first to int_rec_last
										.Write("<a href=""" & arr_actions(k,0,0) & "which=" & dg_recordset(int_id_field,i) & """ target=""" & arr_actions(k,2,0) & """")
										If Not IsNull(arr_actions(k,3,0)) Then
											.Write(" onclick=""" & arr_actions(k,3,0) & dg_recordset(int_id_field,i) & "'""")
										End If
										.Write(">" & arr_actions(k,1,0) & "</a>")
									Next
									.Write("</nobr></td>")
								End With
							End If
						End If
					Else 
						int_colspan_size = dct_colspan_dtl.item(dg_recordset(int_rec_type_field,i))
						If dct_colspan_dtl.item(dg_recordset(int_rec_type_field,i)) < int_field_last Then
							Response.Write("<td" & str_style & str_class & " colspan=""" & int_colspan_size & """>" & dg_recordset(int_colspan_field,i) & "</td>")
							For j = dct_colspan_dtl.item(dg_recordset(int_rec_type_field,i)) + int_colspan_padding to int_field_last
								If (j <> int_id_field and j <> int_cond_field) or (j = int_id_field and bln_show_id_field) or (j = int_cond_field and bln_show_cond_field) or (j = int_class_field and bln_show_class_field) Then
									If Len(dg_recordset(j,i)) > 0 Then
										Response.Write("<td" & str_style & str_class & ">" & dg_recordset(j,i) & "</td>")
									Else
										Response.Write("<td" & str_style & str_class & ">&nbsp;</td>")
									End If
								End If
							Next
							If IsArray(arr_actions) Then
								If Not IsNull(int_action_grp_field) Then
									int_first_action_grp	= Lbound(arr_actions, 3)
									int_last_action_grp		= Ubound(arr_actions, 3)
									For int_curr_action_grp = int_first_action_grp to int_last_action_grp
										If dg_recordset(int_action_grp_field,i) = int_curr_action_grp Then
											With Response
												int_rec_first   = LBound(arr_actions, 1)
												int_rec_last    = UBound(arr_actions, 1)
												.Write("<td class=""actions_box no_print"" align=""center""" & str_style & "><nobr>")
												For k = int_rec_first to int_rec_last
													If Len(arr_actions(k,1,int_curr_action_grp)) > 0 Then
														.Write("<a href=""" & arr_actions(k,0,int_curr_action_grp) & "which=" & dg_recordset(int_id_field,i) & """ target=""" & arr_actions(k,2,int_curr_action_grp) & """")
														If Not IsNull(arr_actions(k,3,int_curr_action_grp)) Then
															.Write(" onclick=""" & arr_actions(k,3,int_curr_action_grp) & dg_recordset(int_id_field,i) & "'""")
														End If
														.Write(">" & arr_actions(k,1,int_curr_action_grp) & "</a>")
													End If
												Next
												.Write("</nobr></td>")
											End With
										End If
									Next
								Else
									With Response
										int_rec_first   = LBound(arr_actions, 1)
										int_rec_last    = UBound(arr_actions, 1)
										.Write("<td class=""actions_box no_print"" align=""center""" & str_style & "><nobr>")
										For k = int_rec_first to int_rec_last
											.Write("<a href=""" & arr_actions(k,0,0) & "which=" & dg_recordset(int_id_field,i) & """ target=""" & arr_actions(k,2,0) & """")
											If Not IsNull(arr_actions(k,3,0)) Then
												.Write(" onclick=""" & arr_actions(k,3,0) & dg_recordset(int_id_field,i) & "'""")
											End If
											.Write(">" & arr_actions(k,1,0) & "</a>")
										Next
										.Write("</nobr></td>")
									End With
								End If
							End If
						Else
							Response.Write("<td" & str_style & str_class & " colspan=""" & int_colspan_size & """>" & dg_recordset(int_colspan_field,i) & "</td>")
						End If
					End If
					Response.write("</tr>")
				Next
				%>
			</table>
			<%
		End If
		
		If bln_footer_navigation and int_total_pages > 1 Then
			Response.Write(str_page_navigation)
		End If
		
		'execution_log "data_grid", str_sql 
	
	End Sub

%>