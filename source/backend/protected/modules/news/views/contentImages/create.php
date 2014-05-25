<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Save'),
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'ok-sign white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'jQuery("#content-images-form").submit();')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/news/contentImages/admin'),
));?>
<?php $this->endWidget();?>
<?php
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Create image type')));
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
$this->endWidget();
?>