<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Create'),
);
$this->menu=array(
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<div class="lastUnit size1of1 header">
	<h1><a href="#"><?php echo UserModule::t('Create Profile Field'); ?></a>
	</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>