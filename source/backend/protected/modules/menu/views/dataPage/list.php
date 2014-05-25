<?php
$this->widget('application.widgets.iGridView', array(
	'id' => 'page-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
			'name'	=>	'page_tree',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->page_tree), "#", array("onclick"=>"window.parent.selectPage(\'$data->id\')"))'
		),
		array(
			'name'	=>	'catid',
			'value'	=>	'BackendCategoriesModel::getNameCat($data->catid)',
			'filter'=>	CHtml::listData(BackendCategoriesModel::model()->findAll('published=:p ORDER BY position ASC', array(':p'=>1)), "id", "title_tree")	
		),
		array(
			'class'=>'JToggleColumn',
			'name'=>'status', // boolean model attribute (tinyint(1) with values 0 or 1)
			'filter' => array('0' => 'No', '1' => 'Yes'), // filter
			'htmlOptions'=>array('width'=>'80'),
			'filter'=> BackendLookupModel::items('PostStatus')
		),
		array(
			'name'	=>	'id',
			'htmlOptions'	=>	array(
				'width'	=>	'30',
			),
		),
	),
)); ?>
