<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Save'),
    'type'=>'success',
	'icon'=>'ok-sign white',
    'url'=> 'javascript:void(0);',
	'htmlOptions'=>array('onclick'=>'jQuery("#payment-method-form").submit();')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/shop/paymentMethod/admin'),
));?>
<?php $this->endWidget();?>

<?php 
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Edit').' #'.$model->id));
echo $this->renderPartial('_form', array('model'=>$model));
$this->endWidget();
?>
