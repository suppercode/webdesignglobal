<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create Tax'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
	'htmlOptions'=>array('style'=>'width: 145px;')
));?>
<?php $this->endWidget();?>

<?php $this->widget('webroot.widgets.iGridView', array(
	'id'=>'tax-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'title',
		'percent',
		array(
			'class'=>'webroot.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
