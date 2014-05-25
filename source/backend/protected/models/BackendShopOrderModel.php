<?php

Yii::import('common.models.db.ShopOrderModel');

class BackendShopOrderModel extends ShopOrderModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}