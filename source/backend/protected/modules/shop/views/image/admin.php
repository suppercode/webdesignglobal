<?php
$this->_toolbar = array(
	'title'		=>	Yii::t('ShopModule.shop', 'Images for # ').$product->title,
);
?>

<div id="shopcontent">


<?php
if($images)
	foreach($images as $image) {
		echo "<label> {$image->title} </label><br />";
		$this->renderPartial('view', array('model' => $image));
	}


echo '<br />';

echo CHtml::link(Yii::t('ShopModule.shop', 'Cancel'), array('/shop/shop/admin')) . '<br />';
echo CHtml::link(Yii::t('ShopModule.shop', 'Upload new Image'), array('create', 'product_id' => $product->product_id));


?>
</div>
