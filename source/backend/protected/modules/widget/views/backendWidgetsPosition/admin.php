<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create Position'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
	'htmlOptions'=>array('style'=>'width: 145px;')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'button',
    'label'=>Yii::t('main', 'Advanced Search'),
    'type'=>'primary',
	'icon'=>'search white',
	'toggle'=>true,
	'htmlOptions'=>array('class'=>'search-button')
));?>
<?php $this->endWidget();?>

<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('backend-widgets-position-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form">
<?php $this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Advanced Search')));?>
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
<?php $this->endWidget();?>
</div><!-- search-form -->

<?php $this->widget('webroot.widgets.iGridView', array(
	'id' => 'backend-widgets-position-model-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'name',
		'description',
		'options',
		array(
			'class'=>'JToggleColumn',
			'name'=>'published', // boolean model attribute (tinyint(1) with values 0 or 1)
			'filter' => array('0' => 'No', '1' => 'Yes'), // filter
			'htmlOptions'=>array('width'=>'80')
		),
		array(
			'class'=>'webroot.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>