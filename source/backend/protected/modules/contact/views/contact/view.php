<?php

$this->beginWidget('webroot.widgets.iButtonBar');
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create ContactModel'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
	'htmlOptions'=>array('style'=>'width: 145px;')
));
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Update'),
    'type'=>'primary',
	'icon'=>'pencil white',
    'url'=> array('update', 'id'=>$model->id),
));
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Close'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/contact/contact/admin'),
));
$this->endWidget();
?>


<?php 
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','View').' #'.$model->id));
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'subject',
'name',
'email',
'mobile',
'content',
'created_datetime',
'status:boolean',
	),
)); ?>
$this->endWidget();
