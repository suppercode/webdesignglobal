<?php 
$model = new Order();

$this->widget('webroot.widgets.iGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'order_id',
		'customer.address.firstname',
		'customer.address.lastname',
		array('name' => 'ordering_date',
			'value' => 'date("M j, Y", $data->ordering_date)'),
		array(
			'class'=>'webroot.widgets.iButtonColumn', 
			'template' => '{view}',
		),

	),
)); ?>
