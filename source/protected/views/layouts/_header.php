<?php
$themeUrl = Yii::app()->theme->baseUrl;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link type="image/x-icon" rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" >
	<!-- blueprint CSS framework -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600italic,600,400italic,300italic,300,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css' />	
	
	<link rel="stylesheet" type="text/css" href="<?php echo $themeUrl; ?>/css/all.css" />
<!-- get jQuery from the google apis -->
	<?php Yii::app()->clientScript->scriptMap=array('jquery.min.js'=>false);?>
	<script type="text/javascript" src="<?php echo $themeUrl; ?>/js/jquery171.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./js/jquery-1.7.1.min.js"><\/script>');</script>
	<script type="text/javascript" src="<?php echo $themeUrl; ?>/js/jquery.main.js"></script>

	<!-- REVOLUTION BANNER CSS SETTINGS -->
	
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="./css/ie.css" /><![endif]-->	
	<link rel="stylesheet" href="<?php echo $themeUrl; ?>/demo/theme_style.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $themeUrl; ?>/demo/theme_settings.js"></script>
	<link rel="stylesheet" class="styleswitcher" href="#" media="screen" />
	<title><?php echo CHtml::encode($this->pageTitle)." | ".Yii::app()->name; ?></title>
</head>