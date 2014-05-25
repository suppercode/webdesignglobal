<?php

Yii::import('common.models.db.ShopOrderPositionModel');

class BackendShopOrderPositionModel extends ShopOrderPositionModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}