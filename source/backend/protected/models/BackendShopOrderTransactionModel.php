<?php

Yii::import('common.models.db.ShopOrderTransactionModel');

class BackendShopOrderTransactionModel extends ShopOrderTransactionModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}