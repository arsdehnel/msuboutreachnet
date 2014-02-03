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
	<div id="header">
		<div id="site_title"><a href="/">Montana State University - Billings :: Outreach</a></div>
		<?=$nav_wrapper;?>
	</div>
	<?
		if( $page_title != 'Page Title' ){
			echo '<h1>' . $page_title . '</h1>';
		}
	?>
	<div id="content"> 						
		<?=$content;?>		
	</div>
</div>
<script type="text/javascript" src="/scripts/modal.js"></script>
<?
	if( $_SESSION['username'] ){
		?>
		<div id="footer_menu">
			<ul>
				<li>Logged in as <strong><?=$_SESSION['username'];?></strong></li>
				<li><a href="/personnel/maintenance/index.asp?which=<?=$_SESSION['user_id'];?>">My Profile</a></li>
				<li><a href="/help/index.asp">Help</a></li>
				<li><a href="/modal/logout.php" class="modal">Log Out</a></li>
			</ul>
		</div>
		<?
	}
	
	if( $view_ind == 'N' || $_SESSION['security_level'] == 0 ){
	
		?>
		<a href="/modal/login.php" class="modal" id="login" modal_width="200" style="display: none;">Secure Login</a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#login').trigger('click');
			});
		</script>
		<?
	
	}elseif( isset( $_SESSION['success_line'] ) ){
	
		?>
		<a href="/modal/success.php" class="modal" id="success" modal_width="200" style="display: none;">Success!</a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#success').trigger('click');
			});
		</script>
		<?
	
	}
?>
</body>
</html>		