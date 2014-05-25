<?php

Yii::import('common.models.db.ShopOrderStatusModel');

class BackendShopOrderStatusModel extends ShopOrderStatusModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}