<?php

Yii::import('common.models.db.ShopPaymentMethodModel');

class BackendShopPaymentMethodModel extends ShopPaymentMethodModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}