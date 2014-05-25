<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('admin-settings-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('application.widgets.iGridView', array(
	'id' => 'admin-settings-model-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		'key_code',
		'value_code',
		array(
					'name' => 'type',
					'value' => '($data->type == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('main', 'System'), '1' => Yii::t('app', 'Yes')),
					),
		'label',
		array(
			'class' => 'application.widgets.iButtonColumn',
		),
	),
)); ?>