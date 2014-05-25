<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

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
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('backend.widgets.iGridView', array(
	'id' => 'backend-shop-order-transaction-model-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		'id',
		'username',
		'phone',
		'ship_address',
		/*'payment_method',
		'ship_method',
		'user_id',
		'cart',
		*/
		array(
			'name'=>'status',
			'value'=>'BackendShopOrderStatusModel::model()->findByPk($data->status)->name'
		),
		array(
				'class'=>'webroot.widgets.iButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>