<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Update Order'),
    'type'=>'primary',
	'icon'=>'pencil white',
    'url'=> array('update', 'id'=>$model->id),
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary',
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/shop/transaction/admin'),
));?>
<?php $this->endWidget();?>
<?php $this->beginWidget('backend.widgets.iPortlet', array('title'=>Yii::t('main','View').' #'.$model->id));?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'username',
		'phone',
		'ship_address',
		array(
			'name'=>'payment_method',
			'value'=>BackendShopPaymentMethodModel::model()->findByPk($model->payment_method)->title
		),
		array(
			'name'=>'ship_method',
			'value'=>BackendShopShippingMethodModel::model()->findByPk($model->ship_method)->title,
		),
		array(
			'name'=>'user_id',
			'value'=>BackendUsersAccountModel::model()->findByPk($model->user_id)->username
		),
		array(
			'name'=>'cart',
			'type'=>'raw',
			'value'=>ShopHelpers::getCartContent($model->cart)
		),
		array(
			'name'=>'status',
			'value'=>BackendShopOrderStatusModel::model()->findByPk($model->status)->name,
		),
	),
)); ?>

<?php $this->endWidget();?>