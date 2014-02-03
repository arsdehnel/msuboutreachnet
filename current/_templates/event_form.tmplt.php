<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xml:lang="en" xmlns="http://www.w3.org/1999/xhtml"><HEAD><META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/styles.css" />
<link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="/css/jquery_datepicker.css" />
<script type="text/javascript" src="/scripts/jquery.datepicker.js"></script>
<script type="text/javascript" src="/scripts/common.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
  		$('input:text:first:visible').focus();
  	});
	$(function() {
		if($('.datepicker').length){
			$(".datepicker").datepicker({
				showOn: 'button',
				buttonImage: '/images/icons/calendar.gif',
				buttonImageOnly: true
			});
		}
	});
</script>
<TITLE>Montana State University - Billings :: Outreach</TITLE>
	
	<!-- Meta Descriptors -->
  	<META http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
	
	<META name="robots" content="noindex, nofollow">
	<META name="description" content="MSUBOutreach.net">
	<META http-equiv="Pragma" content="no-cache">
	<META http-equiv="Expires" content="-1">

	<!-- Script Includes -->
	<script type="text/javascript" language="javascript" charset="UTF-8" src="/scripts/menu.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" language="javascript" charset="UTF-8" src="scripts/dropdown.js"></script>
	<![endif]-->
	
  	<!-- Conditional Style Comments -->
  	<!--[if lte IE 6]>
  		<style type="text/css" media="screen">
    		img { behavior: url("styles/behavior.pngfix.htc"); }
  		</style>
  	<![endif]-->
	
</head>
<body>
<div id="page_wrapper">
	<div id="content"> 
		<?=$header;?>						
		<?=$form_body;?>		
	</div>
</div>
<script type="text/javascript" src="/scripts/modal.js"></script>
</body>
</html>		