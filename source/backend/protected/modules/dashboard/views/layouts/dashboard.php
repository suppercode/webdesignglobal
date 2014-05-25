<?php
$this->beginContent('application.views.layouts.body');
echo $content;
$this->endContent();

/* $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'cl-nav'));
$this->widget('application.widgets.iNavbar', array(
		'type'=>'', // null or 'inverse'
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
				array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'flat-list'),
						'items'=>array(
								array('label'=>Yii::t('main', 'Dashboard'), 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'active'=>true, 'linkOptions'=>array('id'=>'portlets-toggler')),
						),
				),
		),
));
$this->endWidget(); */
?>
