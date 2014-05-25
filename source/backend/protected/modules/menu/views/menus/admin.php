<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menus-grid', {
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

<?php 
$msgdel1 = Yii::t('app', 'Do you really want to delete menu group : ');
$msgdel2 = Yii::t('app', ' And all menu of this group: ');
$this->widget('application.widgets.iGridView', array(
	
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'name'=>'name',
			'value'=>'Chtml::link(Chtml::encode($data->name),array("menuItems/admin","g"=>$data->id))',
			'type'=>'raw'
		),
		'description',
		'update_time',
		array(
			'name'=>'id',
			'htmlOptions'=>array('width'=>50)
		),
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
			'deleteConfirmation'=>"js:'".$msgdel1."'+$(this).parent().parent().children(':nth-child(2)').text()+'".$msgdel2."?'",
		),
	),
	
)); ?>