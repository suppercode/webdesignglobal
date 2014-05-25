<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create Banner'),
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'icon'=>'plus-sign white',
    'url'=> array('create'),
	'htmlOptions'=>array('style'=>'width: 145px;')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Advanced Search'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'search white',
    'url'=> '#',
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
	$.fn.yiiGridView.update('news-grid', {
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
	'id' => 'ads-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array('width'=>'50'),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))'
		),
		array(
				'name'	=>	'name',
				'type'	=>	'raw',
				'value'	=>	'CHtml::link(CHtml::encode($data->name), array("banner/update","id"=>$data->id))'
		),
		'client_id',
		'ordering',
		'clicks',
		array(
			'class'=>'webroot.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>