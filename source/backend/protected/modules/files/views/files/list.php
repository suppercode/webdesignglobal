<?php
$this->widget('webroot.widgets.iGridView', array(
	'id' => 'files-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
			'name'	=>	'name',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->name), "#", array("onclick"=>"window.parent.selectFile(\'$data->id\', \'$data->source_path\')"))'
		),
		'source_path',
		array(
			'name'	=>	'id',
			'htmlOptions'	=>	array(
				'width'	=>	'30',
				'align'	=>	'center'
			),
		),
	),
)); ?>
