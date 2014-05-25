<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('backend-files-model-grid', {
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
	'id' => 'backend-files-model-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		'id',
		'name',
		'source_path',
		'file_type',
		'file_size',
		'download',
		/*
		'view',
		'updated_datetime',
		'created_datetime',
		*/
		array(
				'class'=>'application.widgets.iButtonColumn',
				'htmlOptions'=>array('width'=>'50'),
		),
	),
)); ?>