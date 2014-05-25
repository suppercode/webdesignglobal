<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('comment-grid', {
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
	'id' => 'comment-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array('width'=>'50'),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))'
		),
		array(
			'name'	=>	'email',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->email), array(\'/comment/manage/update\', \'id\'=>$data->id))'
		),
		array(
			'name'	=>	'post_id',
			'value'	=>	'$data->article'
		),
		array(
			'name'=>'status',
			'value'	=>	'BackendLookupModel::item(\'CommentStatus\', $data->status)',
		),
		array(
			'name'=>'type',
			'htmlOptions'=>array('width'=>'100')
		),
		array(
			'name'=>'id',
			'htmlOptions'=>array('width'=>'30')
		),
		array(
				'class'=>'application.widgets.iButtonColumn',
				'htmlOptions'=>array('width'=>'50'),
		),
	),
)); ?>
