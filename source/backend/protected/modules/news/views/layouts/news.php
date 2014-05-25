<?php
//$this->pageTitle=Yii::t("main","Articles Manager");
/* $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'cl-nav'));
$controller = Yii::app()->controller->getId();
$this->widget('webroot.widgets.iNavbar', array(
		'type'=>'', // null or 'inverse'
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
				array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'flat-list'),
						'items'=>array(
								array('label'=>Yii::t('main', 'News Manager'), 'url'=>Yii::app()->createUrl('/news/news/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='news')?true:false),
								array('label'=>Yii::t('main', 'Category Manager'), 'url'=>Yii::app()->createUrl('/news/categories/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='categories')?true:false),
								array('label'=>Yii::t('main', 'Thumb Images Manager'), 'url'=>Yii::app()->createUrl('/news/contentImages/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='contentImages')?true:false),
								array('label'=>Yii::t('main', 'Pages Manager'), 'url'=>Yii::app()->createUrl('/news/pages/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='pages')?true:false),
								array('label'=>Yii::t('main', 'Files Manager'), 'url'=>Yii::app()->createUrl('/files/files/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='files')?true:false),
						),
				),
		),
));
$this->endWidget(); */

$this->beginContent('application.views.layouts.body');
echo $content;
$this->endContent();