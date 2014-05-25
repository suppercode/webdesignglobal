<?php

Yii::import('common.models.db._base.BaseShopCustomerModel');

class ShopCustomerModel extends BaseShopCustomerModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}