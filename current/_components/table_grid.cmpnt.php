<?

	if( $form_ind == 'Y' ){
	
		echo "<form action=\"" . $action . "\" method=\"" . $method . "\" name=\"" . $name . "\">";
	
	}
	
	if( $filter_fields ){
	
		foreach($filter_fields as $field_name => $field_values){
		
			if( $field_values['label'] ){
			
				echo '<label>' . $field_values['label'] . '</label>';
			
			}
			
			echo '<select name="' . $field_values['name'] . '" id="' . $field_values['id'] . '" onchange="document.location.href=\'index.php?' . $field_values['name'] . '=\' + this.value;">';
			if( $field_values['null_option'] == 'Y' ){
				
				echo '<option value="">null</option>';
				
			}
			if( is_resource( $field_values['options'] ) ){
				
				while( $options_rec = pg_fetch_array( $field_values['options'] ) ){
					echo '<option value="' . $options_rec['value'] . '"';
					if( $field_values['selected'] == $options_rec['value'] ){
						echo ' selected';
					}
					echo '>' . $options_rec['label'] . '</option>';
				
				}
				
			}elseif( is_array( $field_values['options'] ) ){

				foreach( $field_values['options'] as $option_items => $option_values ){
				
					echo '<option value="' . $option_values['value'] . '"';
					if( $field_values['selected'] == $option_values['value'] ){
						echo ' selected';
					}
					echo '>' . $option_values['label'] . '</option>';
				
				}
					
			}
			echo '</select>';
			echo '<br />';
			
		}
	
	}
	
	if( $input_fields ){
	
		foreach ($input_fields as $field_name => $field_values){
    
    		if( $field_values['label'] ){
    	
    			echo '<label>' . $field_values['label'] . '</label>';
    	
    		}	
    
    	//do the real work
		switch( $field_values['type'] ){
	
			case "text":
		
				echo '<input type="text" name="' . $field_values['name'] . '" id="' . $field_values['id'] . '" value="' . $field_values['value'] . '" />';
				echo '<br />';
				break;
				
			case "hidden":
		
				echo '<input type="hidden" name="' . $field_values['name'] . '" id="' . $field_values['id'] . '" value="' . $field_values['value'] . '" />';
				break;
				
			case "textarea":
			
				echo '<textarea name="' . $field_values['name'] . '" id="' . $field_values['id'] . '">';
				echo $field_values['value'];
				echo '</textarea>';
				echo '<br />';
				break;
				
			case "date":
			
				echo '<input type="text" name="' . $field_values['name'] . '" id="' . $field_values['id'] . '" value="' . date('m/d/Y',strtotime( $field_values['value'] ) ) . '" onBlur="if(this.value.length > 0){verif_date(this)};" />';
				if($calendar_ind == 'Y'){
					echo '<a href="#" onClick="view_calendar(\'' . $name . '\',\'' . $field_values['name'] . '\',' . $name . '.' . $field_values['name'] . '.value);"><img src="/images/icons/calendar.gif" border="0" alt="View Calendar" height="15" width="18" style="margin: 0px; margin-top: 0px;"></a>';
				}		
				echo '<br />';		
				break;
				
			case "select":
			
				echo '<select name="' . $field_values['name'] . '" id="' . $field_values['id'] . '">';
				if( $field_values['null_option'] == 'Y' ){
				
					echo '<option value="">null</option>';
				
				}
				if( is_resource( $field_values['options'] ) ){
				
					while( $options_rec = pg_fetch_array( $field_values['options'] ) ){
						echo '<option value="' . $options_rec['value'] . '"';
						if( $field_values['selected'] == $options_rec['value'] ){
							echo ' selected';
						}
						echo '>' . $options_rec['label'] . '</option>';
				
					}
				
				}elseif( is_array( $field_values['options'] ) ){

					foreach( $field_values['options'] as $option_items => $option_values ){
				
						echo '<option value="' . $option_values['value'] . '"';
						if( $field_values['selected'] == $option_values['value'] ){
							echo ' selected';
						}
						echo '>' . $option_values['label'] . '</option>';
				
					}
					
				}
				echo '</select>';
				echo '<br />';
				break;
	
		}//type switch
		
	}
	
	}//if input_fields

	if( $grid_rs ){
		
		echo '<table border="1" cellspacing="0" cellpadding="4" style="margin: 0 auto;" id="datagrid">';

			echo "<tr>";
				
				if( $select_rec_ind == 'Y' ){
					
					echo "<th>Select</th>";
					
				}
				
				for( $col = 0; $col < count( pg_fetch_array( $grid_rs, 0, PGSQL_NUM ) ); $col++ ){
						
					echo "<th>" . pg_field_name( $grid_rs, $col ) . '</th>';
							
				}

				if( $actions ){
						
					echo "<th>Actions</th>";
						
				}
										
			echo "</tr>";

			while( $grid_rec = pg_fetch_row( $grid_rs ) ){
	
				echo '<tr>';
				
					if( $select_rec_ind == 'Y' ){
					
						echo "<td align=\"center\"><input type=\"" . $select_type . "\" name=\"" . $select_field_name . "[" . $grid_rec[$id_field] . "]\" /></td>\r";
					
					}
		
					while ( list($key, $val) = each($grid_rec) ){
	
						echo "<td>";
						echo $val;
						echo "</td>";
					
					}
					
					if( $actions ){
					
						echo "<td class=\"actions\" align=\"center\">";
				
						for( $curr_act = 0; $curr_act < count( $actions ); $curr_act++ ){
				
							echo '<a href="' . $actions[$curr_act]['link_url'] . '?id=' . $grid_rec[$id_field] . '" target="' . $actions[$curr_act]['link_target'] . '" onclick="' . str_replace( '%%', $grid_rec[$id_field], $actions[$curr_act]['onclick'] ) . '">';
							echo $actions[$curr_act]["link_text"];
							echo '</a>';
							
						}
					
						echo "</td>";
				
					}
		
				echo '<tr>';
		
			}
	
		echo '</table>';
		
	}//if grid_rs
		
	if( $buttons ){
					
		echo "<div class=\"datagrid_buttons\">";
				
		for( $curr_button = 0; $curr_button < count( $buttons ); $curr_button++ ){
				
			echo '<button type="' . $buttons[$curr_button]['type'] . '" onclick="' . $buttons[$curr_button]['onclick'] . '">';
			echo $buttons[$curr_button]['label'];
			echo '</button>';
							
		}
					
		echo "</div>";
				
	}

?>