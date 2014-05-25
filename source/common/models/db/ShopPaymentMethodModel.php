<?php

Yii::import('common.models.db._base.BaseShopPaymentMethodModel');

class ShopPaymentMethodModel extends BaseShopPaymentMethodModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}