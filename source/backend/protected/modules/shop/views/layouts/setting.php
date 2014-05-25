<?php
$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'cl-nav'));
$urlCurr = $_SERVER['REQUEST_URI'];
$controller = Yii::app()->controller->getId();
$this->widget('webroot.widgets.iNavbar', array(
		'type'=>'', // null or 'inverse'
		'collapse'=>true, // requires bootstrap-responsive.css
		'items'=>array(
			array(
				'class'=>'bootstrap.widgets.TbMenu',
				'htmlOptions'=>array('class'=>'flat-list'),
				'items'=>array(
						array('label'=>Shop::t('Products'), 'url'=>Yii::app()->createUrl('/shop/products/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='products')?true:false),
								array('label'=>Shop::t('Categories'), 'url'=>Yii::app()->createUrl('/shop/category/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='category')?true:false),
								array('label'=>Shop::t('Manufactor'), 'url'=>Yii::app()->createUrl('/shop/shopManufactor/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='shopManufactor')?true:false),
								array('label'=>Shop::t('Order Transaction'), 'url'=>Yii::app()->createUrl('/shop/transaction/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='transaction')?true:false),
								array('label'=>Shop::t('Settings'), 'url'=>Yii::app()->createUrl('/shop/order/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>in_array($controller, array('order','productSpecification', 'shippingMethod','tax','paymentMethod'))),
				),
			),
		),
));
$this->endWidget();

$this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'tbar'));
	$this->widget('webroot.widgets.iNavbox', array(
			'type'=>'', // null or 'inverse'
			'collapse'=>true, // requires bootstrap-responsive.css
			'brand'=>Shop::t('Settings'),
			'items'=>array(
					array(
						'class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array('class'=>'flat-list'),
						'items'=>array(
								array('label'=>Shop::t('Specifications'), 'url'=>Yii::app()->createUrl('/shop/productSpecification/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='productSpecification')?true:false),
								array('label'=>Shop::t('Shipping Methods'), 'url'=>Yii::app()->createUrl('/shop/shippingMethod/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='shippingMethod')?true:false),
								array('label'=>Shop::t('Payment Methods'), 'url'=>Yii::app()->createUrl('/shop/paymentMethod/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='paymentMethod')?true:false),
								array('label'=>Shop::t('Tax'), 'url'=>Yii::app()->createUrl('/shop/tax/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='tax')?true:false),
								array('label'=>Shop::t('Orders'), 'url'=>Yii::app()->createUrl('/shop/order/admin'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>($controller=='order')?true:false),
						),
					),
			),
	));
$this->endWidget();


$this->beginContent('webroot.themes.layouts.column1');
echo $content;
$this->endContent();

