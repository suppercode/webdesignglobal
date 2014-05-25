<?php


$this->beginWidget('webroot.widgets.iButtonBar');
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Save'),
    'type'=>'success',
	'icon'=>'ok-sign white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'jQuery("#contact-model-form").submit();')
));
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Save & Continue'),
    'type'=>'primary',
	'icon'=>'ok white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'if(jQuery("#apply").attr("value",1)) jQuery("#contact-model-form").submit();')
));
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/contact/contact/admin'),
));
$this->endWidget();
?>

<?php
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Create '.GxHtml::encode($model->label()))));
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
$this->endWidget();
?>