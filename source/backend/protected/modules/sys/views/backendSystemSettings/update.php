<?php
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','System Settings')));
$this->renderPartial('_form', array(
		'model' => $model));
$this->endWidget();
?>