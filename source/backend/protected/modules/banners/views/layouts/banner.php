<?php
$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'cl-nav'));
$urlCurr = $_SERVER['REQUEST_URI'];
$controller = Yii::app()->controller->getId();
$this->widget('webroot.widgets.iNavbar', array(
		'type'=>'', // null or 'inverse'
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
				array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'flat-list'),
						'items'=>array(
								array('label'=>Yii::t('main', 'Banners Manager'), 'url'=>Yii::app()->createUrl('/banners/banner/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='banner')?true:false),
								array('label'=>Yii::t('main', 'Customers Manager'), 'url'=>Yii::app()->createUrl('/banners/customers/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='customers')?true:false),
						),
				),
		),
));
$this->endWidget();

$this->beginContent('webroot.themes.layouts.column2');
echo $content;
$this->endContent();
?>