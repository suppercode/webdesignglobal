<?php
$this->breadcrumbs = array(
	'Menuses',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' Menus', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' Menus', 'url' => array('admin')),
);
?>

<h1>Menuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 