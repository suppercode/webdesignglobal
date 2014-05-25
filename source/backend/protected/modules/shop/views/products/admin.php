<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
	'htmlOptions'=>array('style'=>'width: 145px;')
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
	$.fn.yiiGridView.update('products-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form">
<?php $this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Advanced Search')));?>
<?php $this->renderPartial('_search', array(
		'model' => $model,
)); ?>
<?php $this->endWidget();?>
</div><!-- search-form -->
<?php 
$this->widget('webroot.widgets.iGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array(
				'width'	=>	'50',
			),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->product_id))'
		),
		array(
			'name'	=>	'title',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title), array("/shop/products/update","id"=>$data->product_id))'
		),
		array(
			'type'	=>	'raw',
			'name'	=>	'category_id',
			'value'	=>	'Category::model()->getListCategory($data->product_id)',
		),
		'price',
		array(
            'class'=>'JToggleColumn',
            'name'=>'published', // boolean model attribute (tinyint(1) with values 0 or 1)
            'htmlOptions'=>array('width'=>80),
		),
		array(
				'class'=>'webroot.widgets.iButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
		),
	)
)
); 

?>