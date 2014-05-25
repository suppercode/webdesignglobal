<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column2';
	$this->menu=array(
	    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
	    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
	);
}
?>
<div class="lastUnit size1of1 header">
	<h1><a href="#"><?php echo UserModule::t("List User"); ?></a></h1>
</div>

<?php $this->widget('baseGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
		'create_at',
		'lastvisit_at',
	),
)); ?>
