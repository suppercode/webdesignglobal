<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('categories-grid', {
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
</div><!-- search-form -->
<?php $this->widget('application.widgets.iGridView', array(
	'id' => 'categories-grid',
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
			'value'	=>	'CHtml::link($data->title_tree,array("categories/update","id"=>$data->id))',
		),
		'alias',
		array(
			'name'	=>	'parent_id',
			'value'	=>	'($data->parent_id>0)?BackendCategoriesModel::model()->findByPk($data->parent_id)->title:""'
		),
		array(
			'header'	=>Yii::t('main','News Count'),
			'value'=>'$data->newsCount',
			'htmlOptions'	=>	array(
				'width'	=>	'100',
				'align'	=>	'center',
			),
		),
		array(
			'name'	=>	'ordering',
			'htmlOptions'=>array(
				'width'	=>	60,
				'align'	=>	'center'
			)
		),
		array(
				'class'=>'JToggleColumn',
				'name'=>'published', // boolean model attribute (tinyint(1) with values 0 or 1)
				'filter' => array('0' => 'No', '1' => 'Yes'), // filter
				'htmlOptions'=>array('width'=>'80')
		),
		array(
			'name'	=>	'id',
			'htmlOptions'	=>	array(
					'width'	=>	'30',
			)
		),
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>