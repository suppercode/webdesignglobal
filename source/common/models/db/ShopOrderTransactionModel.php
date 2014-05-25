<?php

Yii::import('common.models.db._base.BaseShopOrderTransactionModel');

class ShopOrderTransactionModel extends BaseShopOrderTransactionModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}