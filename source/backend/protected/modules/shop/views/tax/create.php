<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Save'),
    'type'=>'success',
	'icon'=>'ok-sign white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'jQuery("#tax-form").submit();')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/shop/tax/admin'),
));?>
<?php $this->endWidget();?>

<?php 
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Create Tax')));
echo $this->renderPartial('_form', array('model'=>$model));
$this->endWidget();
?>
