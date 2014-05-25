<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallery-items-grid', {
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
	'id' => 'gallery-items-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array('width'=>'50'),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))'
		),
		array(
			'name'	=>	'image',
			'type'	=>	'raw',
			'value'	=>	'CHtml::image(Yii::app()->params["gallery_url"]."/thumb/".$data->image,"",array("width"=>"90","height"=>"45"))',
			'htmlOptions'=>array('width'=>100)
		),
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title), array("galleryItems/update","id"=>$data->id))'
		),
		array(
			'name'	=>	'catid',
			'value'	=>	'$data->category->name',
		),
		array(
			'name'	=>	'id',
			'htmlOptions'	=>	array('width'=>'30'),
		),
		array(
				'class'=>'application.widgets.iButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>