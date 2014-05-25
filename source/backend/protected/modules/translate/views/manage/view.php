<?php
$this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'table_name',
	'pri_id',
	'trans_content',
	'language',
	'update_time',
	'published'
	),
));
?>

