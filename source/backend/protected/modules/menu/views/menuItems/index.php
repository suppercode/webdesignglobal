<?php
$this->breadcrumbs = array(
	'Menu Items',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' MenuItems', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' MenuItems', 'url' => array('admin')),
);
?>

<h1>Menu Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 