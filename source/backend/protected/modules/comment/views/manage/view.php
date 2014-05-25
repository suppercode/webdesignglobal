<?php
$this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'post_id',
	'content',
	'status',
	'email',
	'url',
	'type',
	'create_time',
	'author',
	'modified',
	'modified_by',
	),
));
?>

