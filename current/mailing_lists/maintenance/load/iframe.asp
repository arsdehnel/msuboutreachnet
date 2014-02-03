<link rel="stylesheet" type="text/css" href="/css/sfrm_event_information.css">
<link rel="stylesheet" type="text/css" href="/css/sfrm_iframe.css">
<link rel="stylesheet" type="text/css" href="/css/texts.css">
<!-- #include virtual="/functions/global.asp" -->
<%
	int_label_width = 90
	success_line
	error_line
%>
<form action="upload.asp" method="post" name="frm_mailing_list_load" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="4" cellspacing="8" class="no_border">
	<tr>
		<td class="no_border">
			<label for="event_crn" style="width: <%=int_label_width%>">Load File:</label>
			<input type="file" name="file1" style="width: 600;">
		</td>
	</tr>
	<tr>
		<td class="no_border">
			<input type="submit" value="Load File">&nbsp;&nbsp;&nbsp;<input type="reset" value="Cancel">
			<input type="hidden" name="mailing_list_id" value="<%=Request.QueryString("mailing_list_id")%>">
		</td>
	</tr>
</table>			
</form>