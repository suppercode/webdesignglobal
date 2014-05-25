<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create Shipping Method'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
));?>
<?php $this->endWidget();?>
<?php $this->widget('webroot.widgets.iGridView', array(
	'id'=>'shipping-method-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title), array("/shop/shippingMethod/update","id"=>$data->id))'
		),
		'tax_id',
		'price',
		array(
		'class'=>'webroot.widgets.iButtonColumn',
		'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
