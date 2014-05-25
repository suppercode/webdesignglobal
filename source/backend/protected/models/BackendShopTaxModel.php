<?php

Yii::import('common.models.db.ShopTaxModel');

class BackendShopTaxModel extends ShopTaxModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}