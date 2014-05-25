<?php
$this->pageTitle = Yii::t("main","Settings");
$this->breadcrumbs = array(
	AdminSettingsModel::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . AdminSettingsModel::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . AdminSettingsModel::label(2), 'url' => array('admin')),
);
$this->btnOptions = Chtml::link(Yii::t('app', 'Manage'), array('admin'), array('class'=>'btn btn-sm btn-primary'));
$this->btnOptions .= "&nbsp;".Chtml::link(Yii::t('app', 'Create'), array('create'), array('class'=>'btn btn-sm btn-primary'));
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 