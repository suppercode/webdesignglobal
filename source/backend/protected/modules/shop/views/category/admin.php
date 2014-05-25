<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Advanced Search'),
    'type'=>'primary',
	'icon'=>'search white',
    'url'=> '#',
	'htmlOptions'=>array('class'=>'search-button')
));?>
<?php $this->endWidget();?>

<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
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
$this->widget('webroot.widgets.iGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'afterAjaxUpdate'=>'function(){jQuery(".button-column a").tooltip();}',
	'columns'=>array(
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title_tree), array("/shop/category/update","id"=>$data->category_id))'
		),
		array(
			'type'	=>	'raw',
			'header'	=>Yii::t('app','Products Totals'),
			'htmlOptions'	=>	array(
				'width'	=>	'100',
			),
			'value'	=>	'$data->ProductsCount'
		),
		array(
			'type'=>'raw',
			'header'	=>Yii::t('app','Order'),
			'htmlOptions'	=>	array(
				'width'	=>	'100',
			),
			'value'=>'$data->ordering'
		),
		'level',
		'category_id',
		array(
				'class'=>'webroot.widgets.iButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); 


?>
