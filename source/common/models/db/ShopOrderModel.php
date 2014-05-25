<?php

Yii::import('common.models.db._base.BaseShopOrderModel');

class ShopOrderModel extends BaseShopOrderModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}