<%
	Response.Buffer = False
	
	report_header "Evaluation Summary Report", Request.Form("action_select")
	
	'Response.Write("rpt_eval_summary 'MSMRY'," & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("external_personnel_id"),"ip") & "," & Session("user_id"))
	arr_evaluations_recordset = get_recordset( "rpt_eval_summary 'MSMRY'," & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("external_personnel_id"),"ip") & ",Null,Null,Null," & Session("user_id") )
	
	Dim arr_question_text(7)
	arr_question_text(0) = "Did the program fulfill it's stated objectives?"
	arr_question_text(1) = "Did you develop new skills/concepts as a result of your participation?"
	arr_question_text(2) = "Was the presentation style appropriate to the subject?"
	arr_question_text(3) = "Were the instructors well prepared?"
	arr_question_text(4) = "Were the instructors well informed on the subject?"
	arr_question_text(5) = "Did the instructors use the time effectively?"
	arr_question_text(6) = "Was the facility conducive to learning?"
	arr_question_text(7) = "Did the presenters model effective staff development practices?"

	Dim arr_question_averages(7)
	arr_question_averages(0) = arr_evaluations_recordset(1,0)
	arr_question_averages(1) = arr_evaluations_recordset(2,0)
	arr_question_averages(2) = arr_evaluations_recordset(3,0)
	arr_question_averages(3) = arr_evaluations_recordset(4,0)
	arr_question_averages(4) = arr_evaluations_recordset(5,0)
	arr_question_averages(5) = arr_evaluations_recordset(6,0)
	arr_question_averages(6) = arr_evaluations_recordset(7,0)
	arr_question_averages(7) = arr_evaluations_recordset(8,0)
			
	If Not IsNull(arr_evaluations_recordset) Then
		%>
		<table width="800" border="0" cellspacing="0" bordercolor="#333399" cellpadding="0" align="center">
			<tr>
				<td width="65%">
					<div class="event_form_detail"><strong>Report Dates:</strong></div>
				</td>
				<td width="35%" align="center">
					<div class="event_form_detail"><%=Request.Form("start_date")%> to <%=Request.Form("end_date")%></div>
				</td>
			</tr>
			<%
				If Not Request.Form("coordinator_id") = "" Then
					%>
					<tr>
						<td width="65%">
							<div class="event_form_detail"><strong>Coordinator:</strong></div>
						</td>
						<td width="35%" align="center">
							<div class="event_form_detail"><%=arr_evaluations_recordset(9,0)%></div>
						</td>
					</tr>
					<%
				End If
				If Not Request.Form("coordinator_id") = "" Then
					%>
					<tr>
						<td width="65%">
							<div class="event_form_detail"><strong>Instructor:</strong></div>
						</td>
						<td width="35%" align="center">
							<div class="event_form_detail"><%=arr_evaluations_recordset(11,0)%></div>
						</td>
					</tr>
					<%
				End If
				If Not Request.Form("event_rubric") = "" Then
					%>
					<tr>
						<td width="65%">
							<div class="event_form_detail"><strong>Rubric(s):</strong></div>
						</td>
						<td width="35%" align="center">
							<div class="event_form_detail"><%=arr_evaluations_recordset(10,0)%></div>
						</td>
					</tr>
					<%
				End If
			%>
			<tr>
				<td colspan="2" height="10px">
				</td>
			</tr>
			<tr>
				<td width="65%">
					<div class="event_form_detail"><strong>Count of Evaluations:</strong></div>
				</td>
				<td width="35%" align="center">
					<div class="event_form_detail"><%=arr_evaluations_recordset(0,0)%></div>
				</td>
			</tr>
			<tr>
				<td colspan="2" height="10px">
				</td>
			</tr>
			<%
				For int_current_question = 0 to 7
				
					%>
					<tr>
						<td width="65%">
							<div class="event_form_detail"><strong><%=arr_question_text(int_current_question)%></strong></div>
						</td>
						<td width="35%" align="center">
							<div class="event_form_detail"><%=arr_question_averages(int_current_question)%></div>
						</td>
					</tr>
					<%
				
				Next
			%>
		<%
		
			If Request.Form("above_below") = "Y" Then
									
				For int_current_question = 0 to 7
				
					%>
					<tr>
						<td colspan="2" height="10px">
						</td>
					</tr>
					<tr>
						<td colspan="2" style="border: 1px solid #CCCCCC; padding: 3px;">
							<div class="event_form_detail" style="background-color: #CCCCCC; margin: -3px -3px 0px -3px; padding: 2px; display: block;"><strong><%=arr_question_text(int_current_question)%></strong></div>
							<div class="event_form_detail"><strong>Greater than or equal to</strong></div>
							<%
								'Response.Write("rpt_eval_summary 'ABBLW'," & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("external_personnel_id"),"ip") & "," & (int_current_question + 1) & "," & arr_question_averages(int_current_question) & ",'GT'," & Session("user_id"))
								arr_gt_events_rs = get_recordset( "rpt_eval_summary 'ABBLW'," & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("external_personnel_id"),"ip") & "," & (int_current_question + 1) & "," & arr_question_averages(int_current_question) & ",'GT'," & Session("user_id") )
								If IsArray(arr_gt_events_rs) Then
									For int_current_gt_event = LBound(arr_gt_events_rs,2) to UBound(arr_gt_events_rs,2)
										str_event_title = arr_gt_events_rs(3,int_current_gt_event) & " " & arr_gt_events_rs(4,int_current_gt_event) & "-" & arr_gt_events_rs(5,int_current_gt_event) & " " _
														 & arr_gt_events_rs(6,int_current_gt_event) & " " & arr_gt_events_rs(8,int_current_gt_event) & " " & arr_gt_events_rs(1,int_current_gt_event)									
										
										%>
										<div class="event_form_detail" style="font-size: 12px; padding-left: 30px; text-indent: -15px;">• <%=str_event_title%></div>
										<%
									
									Next
								End If
							%>
							<div style="height: 3px;"></div>
							<div class="event_form_detail"><strong>Less than</strong></div>
							<%
								arr_lt_events_rs = get_recordset(  "rpt_eval_summary 'ABBLW'," & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("external_personnel_id"),"ip") & "," & (int_current_question + 1) & "," & arr_question_averages(int_current_question) & ",'LT'," & Session("user_id") )
								If IsArray(arr_lt_events_rs) Then
									For int_current_lt_event = LBound(arr_lt_events_rs,2) to UBound(arr_lt_events_rs,2)
										str_event_title = arr_lt_events_rs(3,int_current_lt_event) & " " & arr_lt_events_rs(4,int_current_lt_event) & "-" & arr_lt_events_rs(5,int_current_lt_event) & " " _
														 & arr_lt_events_rs(6,int_current_lt_event) & " " & arr_lt_events_rs(8,int_current_lt_event) & " " & arr_lt_events_rs(1,int_current_lt_event)									
										
										%>
										<div class="event_form_detail" style="font-size: 12px; padding-left: 30px; text-indent: -15px;">• <%=str_event_title%></div>
										<%
									
									Next
								End If
							%>
						</td>
					</tr>
					<%
				
				Next
				
			End If
		
		
			If Request.Form("include_comments") = "Y" Then
							
				arr_comments_recordset = get_recordset(  "rpt_eval_summary 'CMTSM'," & Session.SessionID & "," & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("event_rubric"),"ip") & "," & validate_field(Request.Form("coordinator_id"),"ip") & "," & validate_field(Request.Form("external_personnel_id"),"ip") & ",Null,Null,Null," & Session("user_id") )
				
				If IsArray(arr_comments_recordset) Then

					%>				
					<tr>
						<td colspan="2" height="10px">
						</td>
					</tr>
					<tr>
						<td colspan="2" style="border: 1px solid #CCCCCC; padding: 3px;">
							<div class="event_form_detail" style="background-color: #CCCCCC; margin: -3px -3px 0px -3px; padding: 2px; display: block;"><strong>Comments:</strong></div>
							<%
		
							int_record_first = LBound(arr_comments_recordset, 2)
							int_record_last	 = UBound(arr_comments_recordset, 2)
							
							'Instructors
								Response.Write("<div class=""section_title""><strong>Instructors:</strong></div><ul style=""margin: 0px 25px;"">")
								For i = int_record_first to int_record_last
									If Not IsNull(arr_comments_recordset(0,i)) and Not arr_comments_recordset(0,i) = "" Then
										Response.Write("<li class=""event_form_detail"" style=""padding: 0px;"">" & arr_comments_recordset(0,i) & "</li>")
									End If
								Next
								Response.Write("</ul>")

							Response.Write("<br />")
								
							'Content
								Response.Write("<div class=""section_title""><strong>Content:</strong></div><ul style=""margin: 0px 25px;"">")
								For i = int_record_first to int_record_last
									If Not IsNull(arr_comments_recordset(1,i)) and Not arr_comments_recordset(1,i) = "" Then
										Response.Write("<li class=""event_form_detail"" style=""padding: 0px;"">" & arr_comments_recordset(1,i) & "</li>")
									End If
								Next
								Response.Write("</ul>")
								
							Response.Write("<br />")
				
							'Location
								Response.Write("<div class=""section_title""><strong>Location:</strong></div><ul style=""margin: 0px 25px;"">")
								For i = int_record_first to int_record_last
									If Not IsNull(arr_comments_recordset(2,i)) and Not arr_comments_recordset(2,i) = "" Then
										Response.Write("<li class=""event_form_detail"" style=""padding: 0px;"">" & arr_comments_recordset(2,i) & "</li>")
									End If
								Next
								Response.Write("</ul>")
								
							Response.Write("<br />")
				
							'Other Comments
								Response.Write("<div class=""section_title""><strong>Other Comments:</strong></div><ul style=""margin: 0px 25px;"">")
								For i = int_record_first to int_record_last
									If Not IsNull(arr_comments_recordset(3,i)) and Not arr_comments_recordset(3,i) = "" Then
										Response.Write("<li class=""event_form_detail"" style=""padding: 0px;"">" & arr_comments_recordset(3,i) & "</li>")
									End If
								Next
								Response.Write("</ul>")
								
							Response.Write("<br />")
				
							'Additional Courses
								Response.Write("<div class=""section_title""><strong>Additional Courses:</strong></div><ul style=""margin: 0px 25px;"">")
								For i = int_record_first to int_record_last
									If Not IsNull(arr_comments_recordset(4,i)) and Not arr_comments_recordset(4,i) = "" Then
										Response.Write("<li class=""event_form_detail"" style=""padding: 0px;"">" & arr_comments_recordset(4,i) & "</li>")
									End If
								Next
								Response.Write("</ul>")
								
							Response.Write("<br />")
							Response.Write("</td></tr>")
							Response.Write("<tr><td colspan='2' height='10px'></td></tr>")
						
						Else
						
							Response.Write("No answers to these questions for the entered criteria.")
						
						End If
						
					End If
					
					%>
		</table>
		<%
	
	Else
		
		Response.Write("<div class=""event_form_detail""><strong>No evaluations entered for this event</strong></div>")
			
	End If
	
	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->