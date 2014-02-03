<!-- #include virtual="/functions/global.asp" -->
<%
	Response.ContentType = "application/vnd.ms-excel"

	extract_sql = "SELECT vtbl_mailing_list_personnel.mailing_list_id, tbl_personnel.first_name AS [First Name], tbl_personnel.last_name AS [Last Name], tbl_personnel_addresses.address_line1 AS [Address 1], tbl_personnel_addresses.address_line2 AS [Address 2], tbl_personnel_addresses.address_line3 AS [Address 3], tbl_personnel_addresses.address_city AS City, tbl_personnel_addresses.address_state AS State, [address_postal_code] AS Zip FROM (tbl_personnel INNER JOIN tbl_personnel_addresses ON tbl_personnel.personnel_id = tbl_personnel_addresses.personnel_id) INNER JOIN vtbl_mailing_list_personnel ON tbl_personnel.personnel_id = vtbl_mailing_list_personnel.personnel_id WHERE tbl_personnel_addresses.address_primary = True and mailing_list_id = " & Request.QueryString("which")
	
	data_grid extract_sql, True, Null, 0, False, 0, False, Null, Null, "No members found for this mailing list.", False, 0, False, False, Null, Null

%>