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
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div>
<?php
$this->widget('application.widgets.iGridView', array(
	'id' => 'news-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))',
			'htmlOptions'	=>	array(
					'width'	=>	'50',
			),
		),
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title), array("news/update","id"=>$data->id))'
		),
		array(
			'name'	=>	'catid',
			'value'	=>	'BackendCategoriesModel::getNameCat($data->catid)',
		),
		array(
			'class'=>'JToggleColumn',
			'name'=>'status', // boolean model attribute (tinyint(1) with values 0 or 1)
			'filter' => array('0' => 'No', '1' => 'Yes'), // filter
			'htmlOptions'=>array('width'=>'80')
		),
		array(
				'name'	=>	'id',
				'htmlOptions'	=>	array(
						'width'	=>	'30',
				),
		),
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>