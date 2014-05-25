<?php

Yii::import('common.models.db.ShopManufactorModel');

class BackendShopManufactorModel extends ShopManufactorModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}