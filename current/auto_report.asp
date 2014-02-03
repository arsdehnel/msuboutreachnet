<%
	If DateDiff("d", Application("last_auto_report"), Now()) > 0 Then
	'If DateDiff("s", Application("last_auto_report"), Now()) > 0 Then
	'If DateDiff("n", Application("last_auto_report"), Now()) > 0 Then	

		Application.Lock
		Application("last_auto_report") = Now()
		Application.UnLock
		
		site_size_notification
		
	End If
%>
