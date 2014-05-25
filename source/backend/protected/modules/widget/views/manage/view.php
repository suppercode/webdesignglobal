<?php
$this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'title',
'show_title:boolean',
'content',
'widget_name',
'ordering',
'position',
'params',
'created',
'created_by',
'modified',
'modified_by',
'published:boolean',
	),
));
?>

