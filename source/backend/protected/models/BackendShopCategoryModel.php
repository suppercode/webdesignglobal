<?php

Yii::import('common.models.db.ShopCategoryModel');

class BackendShopCategoryModel extends ShopCategoryModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}