<?php

$this->breadcrumbs = array(
	ContactModel::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . ContactModel::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . ContactModel::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(ContactModel::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 