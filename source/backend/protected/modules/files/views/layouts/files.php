<?php
$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'cl-nav'));
$this->widget('webroot.widgets.iNavbar', array(
		'type'=>'', // null or 'inverse'
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
				array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'flat-list'),
						'items'=>array(
								array('label'=>Yii::t('main', 'Files Manager'), 'url'=>Yii::app()->createUrl('files/files/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>true),
						),
				),
		),
));
$this->endWidget();

$this->beginContent('webroot.themes.layouts.column2');
echo $content;
$this->endContent();
?>