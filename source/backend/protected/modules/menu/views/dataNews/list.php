<?php
$this->widget('webroot.widgets.iGridView', array(
	'id' => 'news-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title), "#", array("onclick"=>"window.parent.selectNews(\'$data->id\')"))'
		),
		array(
			'name'	=>	'catid',
			'value'	=>	'BackendCategoriesModel::getNameCat($data->catid)',
			'filter'=>	CHtml::listData(BackendCategoriesModel::model()->findAll('published=:p ORDER BY position ASC', array(':p'=>1)), "id", "title_tree")	
		),
		array(
			'name'	=>	'id',
			'htmlOptions'	=>	array(
				'width'	=>	'30',
				'align'	=>	'center'
			),
		),
	),
)); ?>
