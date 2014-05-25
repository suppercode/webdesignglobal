<?php 
$this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'catid',
	'title',
	'description',
	'image',
	),
));
?>

