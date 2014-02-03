<!-- #include virtual="/functions/global.asp" -->
<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<%	
	int_label_width = 150
	error_line
%>
<body>
<form action="process_password.asp" method="post" name="personnel_password_maintenance">
	<label>Current Password: </label><input type="password" name="old_pwd"><br>
	<label>New Password: </label><input type="password" name="new_pwd1"><br>
	<label>Confirm New Password: </label><input type="password" name="new_pwd2"><br>
	<label></label><input type="submit" value="Update Password">&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onClick="document.location.href='/personnel/maintenance/forms/options/iframe.asp'"><br>
</form>
</body>