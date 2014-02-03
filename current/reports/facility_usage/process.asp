<%
	Response.Buffer = False
	
	report_header "MSUB DT Facility Usage Report (" & format_date(Request.Form("start_date"),"%mm/%dd/%yyyy") & " to " & format_date(Request.Form("end_date"),"%mm/%dd/%yyyy") & ")" , Request.Form("action_select")
%>
<table width="95%" border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
		<th>
			Location
		</th>
		<th>
			Event Code
		</th>
		<th>
			Event Title
		</th>
		<th>
			Event Start Day / Date
		</th>
		<th>
			Event End Day / Date
		</th>
		<th>
			Participants
		</th>
		<th>
			Event Days (within date span)
		</th>
		<th>
			Participant Days
		</th>
		<th>
			Internal Comped Usage
		</th>
		<th>
			University Comped Usage
		</th>
		<th>
			Community Comped Usage
		</th>
		<th>
			Revenue Generating Facility Usage
		</th>
		<th>
			Other Revenue Generation
		</th>		
	</tr>
	<%
			
		arr_locations = get_recordset( "rpt_facility_usage 'LCTNS', " & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("dtl_location"),"ip") & "," & validate_field(Request.Form("cancelled_ind"),"ip") & ",null,null" )
		
		If IsArray(arr_locations) Then
				
			For i = Lbound(arr_locations, 2) to Ubound(arr_locations, 2)
				With Response
					.Write("<tr>")
					.Write("<td rowspan=""" & arr_locations(2,i) & """ valign=""top"">")
					.Write(arr_locations(0,i))
					.Write("</td>")
					
					arr_events = get_recordset( "rpt_facility_usage 'EVNTS', " & validate_field(Request.Form("start_date"),"ip") & "," & validate_field(Request.Form("end_date"),"ip") & "," & validate_field(Request.Form("dtl_location"),"ip") & "," & validate_field(Request.Form("cancelled_ind"),"ip") & "," & validate_field(arr_locations(1,i),"ip") & ",null" )
					
					For j = Lbound(arr_events, 2) to Ubound(arr_events, 2)
						If j <> Lbound(arr_events, 2) Then
							.Write("<tr>")
						End If
						.Write("<td>" & arr_events(0,j) & "</td>")
						.Write("<td>" & arr_events(1,j) & "</td>")
						.Write("<td>" & arr_events(2,j) & "</td>")
						.Write("<td>" & arr_events(3,j) & "</td>")
						.Write("<td>" & arr_events(4,j) & "</td>")
						For k = 6 to 12
							.Write("<td>&nbsp;</td>")
						Next
						.Write("</tr>")						
					Next					
				End With
			Next
			
		End If
	
	%>
</table>
<%

	report_footer Request.Form("action_select")
%>
<!-- #include virtual="/functions/global.asp" -->