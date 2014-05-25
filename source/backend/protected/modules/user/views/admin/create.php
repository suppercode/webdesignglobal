<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);

$this->menu=array(
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('profileField/admin')),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
);
?>
<div class="lastUnit size1of1 header">
	<h1><a href="#"><?php echo Yii::t('main','Create Account'); ?></a></h1>
</div>

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>