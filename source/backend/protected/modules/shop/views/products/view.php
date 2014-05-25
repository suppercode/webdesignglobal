<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Update Product'),
    'type'=>'primary',
	'icon'=>'pencil white',
    'url'=> array('update', 'id'=>$model->product_id),
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/shop/products/admin'),
));?>
<?php $this->endWidget();?>
<?php
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','View').' #'.$model->product_id));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'product_id',
		'sku',
		'category_id',
		'tax_id',
		'title',
		'description',
		'description_full',
		'price',
		'old_price',
		'language',
		'specifications',
		'featured',
		'published',
		'updated_datetime'
	),
));
$this->endWidget();
?>