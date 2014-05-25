<?php 
$this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'name',
	'image',
	'description',
	'time_modified',
	),
));
?>

