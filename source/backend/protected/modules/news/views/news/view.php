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
		'created_by',
		'modified',
		'modified_by',
		'ordering',
		'metakey',
		'metadesc',
		'status',
	),
)); 
?>

