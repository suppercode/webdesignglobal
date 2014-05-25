<?php
 $this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'alias',
'title_tree',
'parent_id',
'params',
'url',
'position',
'ordering',
'published:boolean',
	),
));
 ?>

