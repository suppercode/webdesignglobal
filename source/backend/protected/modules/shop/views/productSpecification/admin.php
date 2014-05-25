<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main',Shop::t('Create Specifications')),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
));?>
<?php $this->endWidget();?>
<?php $this->widget('webroot.widgets.iGridView', array(
	'id'=>'product-specification-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'title',
		'is_user_input',
		'required',
		array(
		'class'=>'webroot.widgets.iButtonColumn',
		'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
