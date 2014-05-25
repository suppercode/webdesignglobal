<?php
 $this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'name',
	'description',
	'update_time',
	),
));
?>

