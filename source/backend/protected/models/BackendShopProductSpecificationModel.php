<?php

Yii::import('common.models.db.ShopProductSpecificationModel');

class BackendShopProductSpecificationModel extends ShopProductSpecificationModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}