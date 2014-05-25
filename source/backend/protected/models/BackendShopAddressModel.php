<?php

Yii::import('common.models.db.ShopAddressModel');

class BackendShopAddressModel extends ShopAddressModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}