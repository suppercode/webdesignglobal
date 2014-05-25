<?php 
$this->btnOptions = "<button type='submit' class='btn btn-primary'>".Yii::t("main","Search")."</button>";
?>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('translates-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
  'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('application.widgets.iGridView', array(
	'id' => 'translates-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'table_name',
		'pri_id',
		array(
			'name'=>'trans_content',
			'value'=>	'HelpTranslate::parseSerilize($data->trans_content)'
		),
		'language',
		'update_time',
	),
)); ?>