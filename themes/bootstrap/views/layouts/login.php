
<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Login - Sistem Informasi Akademik MTs Negeri Punung Pacitan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
                                    <h2 style="vertical-align: middle"><img src='<?php echo Yii::app()->theme->baseUrl; ?>/asset/img/polri-icon.png' width="70px"> Sistem Informasi Kepolisian Polres Brebes</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
                                    <?php echo $content?>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/excanvas.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.stack.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/asset/js/charisma.js"></script>
	
		
</body>
</html>
