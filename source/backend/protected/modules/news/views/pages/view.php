<?php
$this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'catid',
		'title',
		'alias',
		'introtext',
		'fulltext',
		'created',
		array(
			'name'	=>	'created_by',
			'value'	=>	BackendUsersModel::model()->findByPk($model->created_by)->username
		),
		'modified',
		array(
			'name'	=>	'modified_by',
			'value'	=>	BackendUsersModel::model()->findByPk($model->modified_by)->username
		),
		'ordering',
		'metakey',
		'metadesc',
		'status',
	),
));
?>

