<?php
$this->breadcrumbs = array(
	'Gallery Categories',
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' GalleryCategory', 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' GalleryCategory', 'url' => array('admin')),
);
?>

<h1>Gallery Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 