<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Save'),
    'type'=>'success',
	'icon'=>'ok-sign white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'jQuery("#backend-shop-manufactor-model-form").submit();')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Save & Continue'),
    'type'=>'primary',
	'icon'=>'ok white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'if(jQuery("#apply").attr("value",1)) jQuery("#backend-shop-manufactor-model-form").submit();')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/shop/shopManufactor/admin'),
));?>
<?php $this->endWidget();?>
<?php $this->beginWidget('webroot.widgets.iPortlet', array('title'=>Shop::t('Create Manufactor')));?>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>
<?php $this->endWidget();?>