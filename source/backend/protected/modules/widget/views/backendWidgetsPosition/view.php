<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>
<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Update'),
    'type'=>'primary',
	'icon'=>'pencil white',
    'url'=> array('update', 'id'=>$model->id),
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/widget/backendWidgetsPosition/admin'),
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Delete'),
    'type'=>'danger',
	'icon'=>'remove-sign white',
    'url'=> '#',
	'htmlOptions'=>array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')
));?>
<?php $this->endWidget();?>
<?php
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','View').' #'.$model->name));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'description',
'options',
'published:boolean',
	),
));
$this->endWidget();
?>

