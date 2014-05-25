<?php
$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'cl-nav'));
$urlCurr = $_SERVER['REQUEST_URI'];
$controller = Yii::app()->controller->getId();
$action = Yii::app()->controller->action->id;
$this->widget('webroot.widgets.iNavbar', array(
		'type'=>'', // null or 'inverse'
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
				array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'flat-list'),
						'items'=>array(
								array('label'=>Yii::t('main', 'System Requirements'), 'url'=>Yii::app()->createUrl('/infosys/main/index'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($action=='index')?true:false),
								array('label'=>Yii::t('main', 'Author Info'), 'url'=>Yii::app()->createUrl('/infosys/main/author'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($action=='author')?true:false),
						),
				),
		),
));
$this->endWidget();

$this->beginContent('webroot.themes.layouts.column2');
echo $content;
$this->endContent();