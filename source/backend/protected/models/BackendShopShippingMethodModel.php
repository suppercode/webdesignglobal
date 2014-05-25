<?php

Yii::import('common.models.db.ShopShippingMethodModel');

class BackendShopShippingMethodModel extends ShopShippingMethodModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}