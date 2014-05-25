<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create Payment Method'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
));?>
<?php $this->endWidget();?>

<?php $this->widget('webroot.widgets.iGridView', array(
	'id'=>'payment-method-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'title',
		'description',
		'tax_id',
		'price',
		array(
		'class'=>'webroot.widgets.iButtonColumn',
		'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
