<?php

Yii::import('common.models.db.ShopProductVariationModel');

class BackendShopProductVariationModel extends ShopProductVariationModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}