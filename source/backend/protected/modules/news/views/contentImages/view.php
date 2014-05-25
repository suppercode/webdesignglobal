<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Update'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'pencil white',
    'url'=> array('update', 'id'=>$model->id),
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/news/contentImages/admin'),
));?>
<?php $this->endWidget();?>

<?php 

$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','View').' #'.$model->id));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'name',
	'width',
	'height',
	),
));
$this->endWidget();
?>

