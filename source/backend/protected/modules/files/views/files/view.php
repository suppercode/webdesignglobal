
<?php $this->widget('application.widgets.iDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'name',
'source_path',
'file_type',
'file_size',
'download',
'view',
'updated_datetime',
'created_datetime',
	),
)); ?>

