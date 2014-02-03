<%
	Public Sub oneform_budget_line( int_colspan_1, str_column_1, str_budget_item_type, int_colspan_2, str_first_entry_title, str_second_entry_title, str_calculated_title, str_budget_type, str_budget_item, str_budget_group, int_id_number )
	
		str_event_title = 0
		%>
		<tr>
			<%
				If int_colspan_1 = 1 Then
						If IsNull(str_column_1) Then
							%>
							<td class="column_1 empty">&nbsp;
								
							</td>							
							<%
						Else
							%>
							<td class="column_1">
								<%=str_column_1%>
							</td>							
							<%
						End If
					%>
					<td class="column_2">
						<%=str_budget_item_type%>
					</td>
					<%
				Elseif int_colspan_1 = 2 Then
					If IsNull(str_column_1) Then
						%>
						<td class="column_1 empty" colspan="2">&nbsp;
							
						</td>							
						<%
					Else
						%>
						<td class="column_1 empty" style="width: 155px;" colspan="2">
							<%=str_column_1%>
						</td>							
						<%
					End If
				End If
				If int_colspan_2 = 1 Then
					%>
					<td class="column_3">
						<em class="oneform_budget_note"><%=str_first_entry_title%></em>
						$<input type="text" name="<%=str_budget_item%>_1" style="width: 40px;" value="<%=str_event_title%>" onblur="update_totals(1,'<%=str_budget_item%>', '<%=str_budget_type%>', '<%=str_budget_group%>');">
					</td>
					<td class="column_4">
						<em class="oneform_budget_note"><%=str_second_entry_title%></em>
						$<input type="text" name="<%=str_budget_item%>_2" style="width: 40px;" value="<%=str_event_title%>" onblur="update_totals(2,'<%=str_budget_item%>', '<%=str_budget_type%>', '<%=str_budget_group%>');">
					</td>
					<td class="column_5">
						<em class="oneform_budget_note"><%=str_calculated_title%></em>
						$<input type="text" name="<%=str_budget_item%>" style="width: 40px;" value="<%=str_event_title%>" id="<%=str_budget_group%>_<%=int_id_number%>" disabled="disabled" class="disabled_input" onblur="update_totals(3,'<%=str_budget_item%>', '<%=str_budget_type%>', '<%=str_budget_group%>');">
					</td>
					<%
				Elseif int_colspan_2 = 3 Then
					%>
					<td class="column_3" colspan="<%=int_colspan_2%>" style="width: 345px;">
						<em class="oneform_budget_note"><%=str_first_entry_title%></em>
						$<input type="text" name="<%=str_budget_item%>" style="width: 40px;" value="<%=str_event_title%>" id="<%=str_budget_group%>_<%=int_id_number%>" onblur="update_totals(3,'<%=str_budget_item%>', '<%=str_budget_type%>', '<%=str_budget_group%>');">
					</td>
					<%
				End If
			%>
			<td class="column_6">
				<%=str_budget_type%>
			</td>
			<td class="column_7">
				$<input type="text" name="<%=str_budget_item%>_target" style="width: 40px;" value="<%=str_event_title%>" disabled="disabled" class="disabled_input" id="<%=str_budget_group%>_target_<%=int_id_number%>">
			</td>
			<td class="column_8">
				$<input type="text" name="<%=str_budget_item%>_minimum" style="width: 40px;" value="<%=str_event_title%>" disabled="disabled" class="disabled_input" id="<%=str_budget_group%>_minimum_<%=int_id_number%>">
			</td>
			<td class="column_9">
				$<input type="text" name="<%=str_budget_item%>_maximum" style="width: 40px;" value="<%=str_event_title%>" disabled="disabled" class="disabled_input" id="<%=str_budget_group%>_maximum_<%=int_id_number%>">
			</td>
		</tr>
		<%							
	End Sub
	
	Public Sub oneform_title_line( str_title_text )	
		%>
		<tr>
			<td colspan="11" class="oneform_budget_section_header">
				<%=str_title_text%>
			</td>
		</tr>
		<%
	End Sub
	
	Public Sub oneform_budget_spacer
		%>
		<tr>
			<td colspan="11" class="spacer">
			</td>
		</tr>
		<%
	End Sub
%>
<script language="javascript">
function update_totals(int_field_id, str_budget_item, str_budget_type, str_area_title){

	arr_enrollment_types = new Array();
	arr_enrollment_types[0] = "_target";
	arr_enrollment_types[1] = "_minimum";
	arr_enrollment_types[2] = "_maximum";

	if(int_field_id != 0){
		arr_enrollment_values = new Array();	
		arr_enrollment_values[0] = frm_one_form.elements[str_area_title + '_enrollment_target'].value;
		arr_enrollment_values[1] = frm_one_form.elements[str_area_title + '_enrollment_minimum'].value;
		arr_enrollment_values[2] = frm_one_form.elements[str_area_title + '_enrollment_maximum'].value;
	}
	
	if(str_area_title == 'direct_expenses'){
		int_max_id_value = 24
	}else if(str_area_title == 'revenue'){
		int_max_id_value = 3
	}else if(str_area_title == 'program_expenses'){
		int_max_id_value = 5
	}
	
	if(int_field_id == 3){
	
		if(String(str_budget_type).substring(0,8) != "VARIABLE"){
	
			for(i = 0; i <= 2; i++){
				str_field_name = str_budget_item + arr_enrollment_types[i];
				frm_one_form.elements[str_field_name].value = Math.round((frm_one_form.elements[str_budget_item].value)*1000)/1000;
			}
			
		}
		else{
		
			for(i = 0; i <= 2; i++){
				str_field_name = str_budget_item + arr_enrollment_types[i];
				frm_one_form.elements[str_field_name].value = Math.round((frm_one_form.elements[str_budget_item].value * arr_enrollment_values[i])*1000)/1000;
			}
			
		}
		
	}
	else if(int_field_id == 1 || int_field_id == 2){
	
		str_field1_name = str_budget_item + '_1';
		str_field2_name = str_budget_item + '_2';
		int_field_value = frm_one_form.elements[str_field1_name].value * frm_one_form.elements[str_field2_name].value;
	
		if(str_budget_type == "FIXED"){
	
			for(i = 0; i <= 2; i++){
				frm_one_form.elements[str_budget_item].value = Math.round((int_field_value)*1000)/1000;
				str_field_name = str_budget_item + arr_enrollment_types[i];
				frm_one_form.elements[str_field_name].value = Math.round((int_field_value)*1000)/1000;
			}
			
		}
		else{
			for(i = 0; i <= 2; i++){
				frm_one_form.elements[str_budget_item].value = Math.round((int_field_value)*1000)/1000;
				str_field_name = str_budget_item + arr_enrollment_types[i];
				frm_one_form.elements[str_field_name].value = Math.round((int_field_value * arr_enrollment_values[i])*1000)/1000;
			}
			
		}
	
	}
	
	for(i = 0; i <= 2; i++){
		int_field_type_value = 0
		for(j = 1; j <= int_max_id_value; j++){
			str_id = str_area_title + arr_enrollment_types[i] + '_' + j;
			if(parseInt(document.getElementById(str_id).value.length) != 0){
				int_field_type_value = Math.round((parseFloat(int_field_type_value) + parseFloat(document.getElementById(str_id).value))*1000)/1000;
				document.getElementById(str_area_title + arr_enrollment_types[i]).value = int_field_type_value;
			}
		}		
	}
	
	update_pricing_calculator();

}

function update_enrollments(str_budget_group, str_enrollment_type){

	arr_ids_to_update = new Array();

	if(str_budget_group == 'program_expenses'){
	
		arr_ids_to_update[0] = 1;
		arr_ids_to_update[1] = 2;
		arr_ids_to_update[2] = 3;
		arr_ids_to_update[3] = 4;
		arr_ids_to_update[4] = 5;
	
	}else if(str_budget_group == 'revenue'){
	
		arr_ids_to_update[0] = 1;
		arr_ids_to_update[1] = 2;
		arr_ids_to_update[2] = 3;
	
	}else if(str_budget_group == 'direct_expenses'){

		arr_ids_to_update[0] = 3;
		arr_ids_to_update[1] = 7;
		arr_ids_to_update[2] = 10;
		arr_ids_to_update[3] = 16;
		arr_ids_to_update[4] = 18;
		arr_ids_to_update[5] = 20;
		arr_ids_to_update[6] = 23;

	}
	
	int_enrollment = frm_one_form.elements[str_budget_group + '_enrollment_' + str_enrollment_type].value;
	
	for(i = 0; i < arr_ids_to_update.length; i++){

		int_item_value 			= document.getElementById(str_budget_group + '_' + arr_ids_to_update[i]).value;
		int_enrollment_value	= frm_one_form.elements[str_budget_group + '_enrollment_' + str_enrollment_type].value;
		
		document.getElementById(str_budget_group + '_' + str_enrollment_type + '_' + arr_ids_to_update[i]).value = int_item_value * int_enrollment_value;
		
	}
	
	update_pricing_calculator();

}
function update_pricing_calculator(){
	
	int_direct_expense_total 		= frm_one_form.elements['direct_expenses_target'].value;
	int_direct_expense_enrollment	= frm_one_form.elements['direct_expenses_enrollment_target'].value;
	int_expense_per_participant		= int_direct_expense_total / int_direct_expense_enrollment;
	frm_one_form.elements['pricing_calculator_pp'].value = Math.round((int_expense_per_participant)*100)/100
	frm_one_form.elements['pricing_calculator_40'].value = Math.round((int_expense_per_participant/.4)*100)/100
	frm_one_form.elements['pricing_calculator_50'].value = Math.round((int_expense_per_participant/.5)*100)/100
	frm_one_form.elements['pricing_calculator_60'].value = Math.round((int_expense_per_participant/.6)*100)/100

}
</script>