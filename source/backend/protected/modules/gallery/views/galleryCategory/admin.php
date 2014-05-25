<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallery-category-grid', {
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
	'id' => 'gallery-category-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		
		array(
			'name'	=>	'name',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->name), array("galleryCategory/update","id"=>$data->id))'
		),
		array(
			'name'	=>	'image',
			'type'	=>	'raw',
			'value'	=>	'($data->image!=NULL)?CHtml::image(Yii::app()->params["gallery_url"]."/category/thumb/".$data->image,"",array("width"=>"90","height"=>"45")):\'\'',
			'htmlOptions'=>array('width'=>100)
		),
		'description',
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