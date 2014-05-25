<?php

Yii::import('common.models.db.ShopCustomerModel');

class BackendShopCustomerModel extends ShopCustomerModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}