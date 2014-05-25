<div id="shopcontent">

<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('ShopModule.shop', 'Administrate Categories'))); ?>
<?php $this->renderPartial('/category/admin', array('model'=>$category)); ?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('ShopModule.shop', 'Administrate your Products'))); ?>
<?php $this->renderPartial('/products/admin'); ?>
<?php $this->endWidget(); ?>

<div class="clear"></div>

<?php $this->beginWidget('zii.widgets.CPortlet',
		array('title' => Yii::t('ShopModule.shop', 'Pending Orders'))); ?>
<?php $this->renderPartial('/order/admin'); ?>
<?php $this->endWidget(); ?>

<div class="clear"></div>
</div>

