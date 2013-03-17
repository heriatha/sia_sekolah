<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $this->title?></title>
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
	<!--<link href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/bootstrap-datepicker.css" rel="stylesheet">-->
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
	<link href='<?php echo Yii::app()->theme->baseUrl; ?>/asset/css/general.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/img/favicon.ico">
        <script type="text/javascript">
            function base_url(){
                return "<?php echo Yii::app()->baseUrl?>";
            }
        </script>	
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!--<a class="brand" href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/index.html"> <span>Sistem Informasi Akademik Tahun Ajaran </span></a>-->
				
				<!-- user dropdown starts -->
                                
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="icon-user"></i><span class="hidden-phone"> <?php echo Yii::app()->user->getUsername()?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
                                            <li><a href="<?php echo Yii::app()->createUrl('user/update',array('id'=>Yii::app()->user->getUserId(),'returnUrl'=>  Yii::app()->request->url))?>">Profile</a></li>
						<li class="divider"></li>
                                                <li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a></li>
					</ul>
				</div>
<!--                                <div class="btn-group pull-right">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="display: inline">
                                            <i class="icon-cog"></i><span class="hidden-phone">Setting</span>
						<span class="caret"></span>
					</a>
                                        <ul class="dropdown-menu">
                                                <?php 
                                                foreach($this->widget('ext.MainMenu')->getMenu() as $menu){
                                                    echo '<div title="'.$menu['module'].'" selected="true" style="overflow:auto;" class="module-menu">';
                                                    echo '<ul>';
                                                    foreach($menu['menu'] as $m){
                                                        $param=array();
                                                        if(isset($m['param'])){
                                                            $param=$m['param'];
                                                        }
                                                        ?>
                                                        <li><a href="<?php echo Yii::app()->createUrl($m['url'],$param) ?>"><span class="hidden-tablet"><?php echo $m['title']?></span></a></li>    
                                                        <?php
                                                    }
                                                    echo '</ul>';
                                                    echo '</div>';
                                                }
                                                ?>
					</ul>
                                </div>-->
                                <a href="<?php echo Yii::app()->baseUrl?>" class="btn pull-right">Home</a>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
                                    <span style="font-size: large;vertical-align: bottom"><img src='<?php echo Yii::app()->theme->baseUrl; ?>/asset/img/mts-icon.png' width="30px"> Sistem Informasi Akademik MTs Negeri Punung Pacitan</span>
<!--					<ul class="nav">
						<li><a href="#">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>-->
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
                                                <?php 
                                                $userType=  Yii::app()->user->getUserType();
                                                foreach($this->widget('ext.MainMenu')->getMenu() as $menu){
//                                                    echo '<div title="'.$menu['module'].'" selected="true" style="overflow:auto;" class="module-menu">';
//                                                    echo '<ul>';
                                                    foreach($menu['menu'] as $m){
                                                        $param=array();
                                                        if(isset($m['param'])){
                                                            $param=$m['param'];
                                                        }
                                                        if(isset($m['access'][$userType])&& $m['access'][$userType]){
                                                            ?><li><a class="ajax-link" href="<?php echo Yii::app()->createUrl($m['url'],$param) ?>"><i class="icon-blank"></i><span class="hidden-tablet"><?php echo $m['title']?></span></a></li><?php
                                                        }
                                                    }
//                                                    echo '</ul>';
//                                                    echo '</div>';
                                                }
                                                ?>
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div>
			</div>
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="<?php echo Yii::app()->theme->baseUrl; ?>/asset/http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
<!--			 content starts 
                        <div class="sortable row-fluid ui-sortable" style="text-align: center;vertical-align: middle;">
                            <a data-rel="tooltip" class="well span2 top-block" href="<?php echo Yii::app()->createUrl('polisi') ?>">
                                <span class="icon32 icon-red icon-user"></span>
                                <div>Polisi</div>
                            </a>
                        </div>-->

			<div>
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                                    'links'=>$this->breadcrumbs,
                                )); ?>
			</div>
                        <div class="modal" id="myModelDialog" style="display: none"></div>
			<div class="sortable row-fluid">
                            