<!-- #include virtual="/layout/_top.asp" -->
<br><center>
<span id="event_form_box">
<%
	int_event_id = Request.QueryString("event_id")
	event_forms_header "Event Logistics Request", int_event_id, "std"
	
	arr_logistics_rs = get_recordset( "prc_event_form_data_lookup 'FLGST'," & validate_field(int_event_id,"ip") )
	
%>
<table width="100%" border="0" cellspacing="0" bordercolor="#000066" cellpadding="0">
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Contact:</strong> <%=arr_logistics_rs(21,0)%>&nbsp;<%=arr_logistics_rs(22,0)%></div>
		</td>
		<td width="50%">
			<div class="event_form_detail"><strong>Phone:</strong> <%=arr_logistics_rs(23,0)%></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="event_form_detail"><strong>Proposed Course Schedule:</strong></div>
			<%
				data_grid "prc_event_dtl_lookup 'LPCSC',Null," & validate_field(int_event_id,"ip") & ",Null", True, Null, 0, True, 0, True, Null, Null, False, Null, Null, False, "No schedule set for this event.", False, 0, False, False, Null, Null
			%>
		</td>
	</tr>	
	<tr>
		<td colspan="2">
			<div class="ef_section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Room Access</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="event_form_detail"><strong style="width: 170px;">Room needs to be opened at: </strong><span style="width: 100px;"><%=arr_logistics_rs(5,0)%></span> <strong>by:</strong> <%=arr_logistics_rs(6,0)%>&nbsp;<%=arr_logistics_rs(7,0)%></div>
			<div class="event_form_detail"><strong style="width: 170px;">Room needs to be locked at: </strong><span style="width: 100px;"><%=arr_logistics_rs(8,0)%></span> <strong>by:</strong> <%=arr_logistics_rs(9,0)%>&nbsp;<%=arr_logistics_rs(10,0)%></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="ef_section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Equipment Needs</div>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<div class="event_form_detail"><strong>Have room set by:</strong> <%=arr_logistics_rs(11,0)%></div>
			<div class="event_form_detail"><strong>Set room for:</strong> <%=arr_logistics_rs(18,0)%></div>
		</td>
		<td width="50%" valign="top">
			<div class="event_form_detail"><strong>Needs:</strong></div>
			<%
				arr_eqp_rs = get_recordset( "prc_event_logistics_lookup 'LEFSM',Null," & validate_field(int_event_id,"ip") & ",'EQP',Null" )
				If IsArray(arr_eqp_rs) Then
					For i = LBound(arr_eqp_rs,2) to UBound(arr_eqp_rs,2)
						Response.Write("<div class=""event_form_detail"" style=""padding: 0px 10px;"">" & arr_eqp_rs(0,i) & "</div>")
					Next
				Else
					Response.Write("<div class=""event_form_detail"" style=""padding: 0px 10px;"">No equipment needed.</div>")
				End If
			%>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="ef_section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Catering Needs</div>
		</td>
	</tr>
	<tr>
		<td width="50%" valign="top">
			<div class="event_form_detail" style="background-color: #EEEEEE; font-weight: bold; padding: 2px; margin: 4px; border-bottom: 1px dotted #000066;">Inside Catering</div>
			<div class="event_form_detail"><strong>Have catering set by:</strong> <%=arr_logistics_rs(12,0)%></div>
			<div class="event_form_detail"><strong>Set catering for:</strong> <%=arr_logistics_rs(18,0)%></div>
			<div class="event_form_detail"><strong>Catering ordered from:</strong> <%=arr_logistics_rs(14,0)%></div>
			<div class="event_form_detail"><strong>Needs:</strong></div>
			<%
				arr_cat_rs = get_recordset( "prc_event_logistics_lookup 'LEFSM',Null," & validate_field(int_event_id,"ip") & ",'CAT',Null" )
				If IsArray(arr_cat_rs) Then
					For i = LBound(arr_cat_rs,2) to UBound(arr_cat_rs,2)
						Response.Write("<div class=""event_form_detail"" style=""padding: 0px 10px;"">" & arr_cat_rs(0,i) & "</div>")
					Next
				Else
					Response.Write("<div class=""event_form_detail"" style=""padding: 0px 10px;"">Nothing else needed.</div>")
				End If
			%>
		</td>
		<td width="50%" valign="top">
			<div class="event_form_detail" style="background-color: #EEEEEE; font-weight: bold; padding: 2px; margin: 4px; border-bottom: 1px dotted #000066;">Outside Catering</div>
			<div class="event_form_detail"><strong>Have room open by:</strong> <%=arr_logistics_rs(5,0)%></div>
			<div class="event_form_detail"><strong>Caterer:</strong> <%=arr_logistics_rs(13,0)%></div>
			<div class="event_form_detail"><strong>Contact:</strong> <%=arr_logistics_rs(14,0)%></div>
			<div class="event_form_detail"><strong>Phone Number:</strong> <%=arr_logistics_rs(15,0)%></div>
			<div class="event_form_detail"><strong>Caterer Notes:</strong> <%
				If IsNull(arr_logistics_rs(25,0)) or arr_logistics_rs(25,0) = "" Then
					Response.Write("No equipment needed.")
				Else
					Response.Write(arr_logistics_rs(25,0))
				End If
			%></div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="ef_section_title" style="border: 0px; margin-bottom: 4px; margin-top: 12px;">Remarks and Notes</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="event_form_detail"><%=arr_logistics_rs(24,0)%></div>
		</td>
	</tr>
</table>
</span>
</center>
<!-- #include virtual="/layout/_bottom.asp" -->
