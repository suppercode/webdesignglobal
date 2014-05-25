
<?php $this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'parent_id',
'level',
'title',
'alias',
'created',
'created_by',
'modified',
'modified_by',
'published:boolean',
	),
)); ?>
