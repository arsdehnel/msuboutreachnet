<!-- #include virtual="/functions/global.asp" -->
<style type="text/css">
.section_header{
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	background-color: #333399;
	padding: 4px;
	margin: -3px 0;
}
BODY{
	background-color: #CCCCCC;
}
</style>
<%	
	int_mailing_list_personnel_id = Request.QueryString("which")
	int_personnel_id = get_first_value( "SELECT personnel_id FROM vtbl_mailing_list_personnel WHERE mailing_list_personnel_id = " & Request.QueryString("which") )
	int_mailing_list_id = get_first_value( "SELECT mailing_list_id FROM vtbl_mailing_list_personnel WHERE mailing_list_personnel_id = " & Request.QueryString("which") )
	str_personnel_name = get_first_value( "SELECT first_name & ' ' & last_name FROM tbl_personnel WHERE personnel_id = " & int_personnel_id )
		
	'Get IDs	
	int_email_id = get_first_value( "SELECT email_id FROM tbl_personnel_emails WHERE personnel_id = " & int_personnel_id & " and email_primary = True" )
	int_phone_id = get_first_value( "SELECT phone_id FROM tbl_personnel_phones WHERE personnel_id = " & int_personnel_id & " and phone_primary = True" )
	int_address_id = get_first_value( "SELECT address_id FROM tbl_personnel_addresses WHERE personnel_id = " & int_personnel_id & " and address_primary = True" )
		
	'Email
	If Not IsNull(int_email_id) Then
		arr_email_recordset = get_recordset( "SELECT * FROM tbl_personnel_emails WHERE email_id = " & int_email_id, False )
		int_email_id			= arr_email_recordset(0,0)
		int_personnel_id		= arr_email_recordset(1,0)
		str_email_title			= arr_email_recordset(2,0)
		str_email_address		= arr_email_recordset(3,0)
		bln_email_primary		= arr_email_recordset(4,0)
		str_submit_button_text 	= "Update E-mail Address"
	Else
		int_email_id			= 0
		int_personnel_id		= Request.QueryString("personnel_id")
		str_submit_button_text  = "Add E-mail Address"
		str_email_title			= "Main"
		str_email_address		= "username@domain.com"
		bln_email_primary		= True
	End If
	
	'Phone
	If Not IsNull(int_phone_id) Then
		arr_phone_recordset = get_recordset( "SELECT * FROM tbl_personnel_phones WHERE phone_id = " & int_phone_id, False )
		int_phone_id			= arr_phone_recordset(0,0)
		int_personnel_id		= arr_phone_recordset(1,0)
		str_phone_title			= arr_phone_recordset(2,0)
		str_phone_number		= arr_phone_recordset(3,0)
		bln_phone_primary		= arr_phone_recordset(4,0)
		If bln_phone_primary Then
			str_primary = " checked"
		Else
			str_primary = bln_phone_primary
		End If
		str_submit_button_text 	= "Update Phone Number"
	Else
		int_phone_id		= 0
		int_personnel_id		= Request.QueryString("personnel_id")
		str_phone_title			= "Main"
		str_phone_number		= "406"
		bln_phone_primary		= True
		str_submit_button_text  = "Add Phone Number"
	End If

	'Address
	If Not IsNull(int_address_id) Then
		arr_address_recordset = get_recordset( "SELECT * FROM tbl_personnel_addresses WHERE address_id = " & int_address_id, False )
		int_address_id			= arr_address_recordset(0,0)
		int_personnel_id		= arr_address_recordset(1,0)
		str_address_title		= arr_address_recordset(2,0)
		str_address_line1		= arr_address_recordset(3,0)
		str_address_line2		= arr_address_recordset(4,0)
		str_address_line3		= arr_address_recordset(5,0)
		str_address_city		= arr_address_recordset(6,0)
		str_address_state		= arr_address_recordset(7,0)
		str_address_postal_code	= arr_address_recordset(13,0)
		bln_address_primary		= arr_address_recordset(8,0)
		str_submit_button_text 	= "Update Postal Address"
	Else
		int_address_id		= 0
		int_personnel_id		= Request.QueryString("personnel_id")
		str_submit_button_text = "Add Postal Address"
		str_address_title		= "Main"
		str_address_line1		= ""
		str_address_line2		= ""
		str_address_line3		= ""
		str_address_city		= ""
		str_address_state		= ""
		str_address_postal_code	= ""
		bln_address_primary		= True
	End If
	
	
	int_label_width = 100
	
%>
<body>
<div style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; color: #333399; margin-bottom: 8px;"><%=str_personnel_name%></div>
<table width="100%">
	<tr>
		<td width="50%">
			<div class="section_header">E-mail Address</div>
			<form action="process.asp?which=email" method="post" name="personnel_email_address_maintenance" class="css_form">
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Title: </label><input type="text" name="email_title" value="<%=str_email_title%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Address: </label><input type="text" name="email_address" value="<%=str_email_address%>"><br>
				<input type="submit" value="<%=str_submit_button_text%>" class="button"><input type="hidden" name="mailing_list_personnel_id" value="<%=int_mailing_list_personnel_id%>" class="hidden"><input type="hidden" name="email_id" value="<%=int_email_id%>" class="hidden">&nbsp;&nbsp;&nbsp;<input type="button" value="Back to Mailing List" onClick="document.location.href='iframe.asp?which=<%=int_mailing_list_id%>'" class="button"><input type="hidden" name="email_primary" value="True">
			</form>
		</td>
		<td width="50%">
			<div class="section_header">Phone Number</div>
			<form action="process.asp?which=phone" method="post" name="personnel_phone_number_maintenance" class="css_form">
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Title: </label><input type="text" name="phone_title" value="<%=str_phone_title%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Number: </label><input type="text" name="phone_number" value="<%=str_phone_number%>"><br>
				<input type="submit" value="<%=str_submit_button_text%>" class="button"><input type="hidden" name="mailing_list_personnel_id" value="<%=int_mailing_list_personnel_id%>" class="hidden"><input type="hidden" name="phone_id" value="<%=int_phone_id%>" class="hidden">&nbsp;&nbsp;&nbsp;<input type="button" value="Back to Mailing List" onClick="document.location.href='iframe.asp?which=<%=int_mailing_list_id%>'" class="button"><input type="hidden" name="phone_primary" value="True">
			</form>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="section_header">Postal Address</div>
		</td>
	</tr>
	<form action="process.asp?which=address" method="post" name="personnel_postal_address_maintenance" class="css_form">
		<tr>
			<td valign="top">
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Title: </label><input type="text" name="address_title" value="<%=str_address_title%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Line 1: </label><input type="text" name="address_line1" value="<%=str_address_line1%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Line 2: </label><input type="text" name="address_line2" value="<%=str_address_line2%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Line 3: </label><input type="text" name="address_line3" value="<%=str_address_line3%>"><br>
			</td>
			<td>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">City: </label><input type="text" name="address_city" value="<%=str_address_city%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">State: </label><input type="text" name="address_state" value="<%=str_address_state%>"><br>
				<label for="event_recurrence" style="width: <%=int_label_width%>;">Postal Code: </label><input type="text" name="address_postal_code" value="<%=str_address_postal_code%>"><br>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="<%=str_submit_button_text%>" class="button"><input type="hidden" name="mailing_list_personnel_id" value="<%=int_mailing_list_personnel_id%>" class="hidden"><input type="hidden" name="address_id" value="<%=int_address_id%>">&nbsp;&nbsp;&nbsp;<input type="button" value="Back to Mailing List" onClick="document.location.href='iframe.asp?which=<%=int_mailing_list_id%>'" class="button"><input type="hidden" name="address_primary" value="True">
			</td>
		</tr>
	</form>
</table>
</body>