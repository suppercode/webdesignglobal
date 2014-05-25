<?php

Yii::import('common.models.db.ShopProductsModel');

class BackendShopProductsModel extends ShopProductsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}