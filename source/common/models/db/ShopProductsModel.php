<?php

Yii::import('common.models.db._base.BaseShopProductsModel');

class ShopProductsModel extends BaseShopProductsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}