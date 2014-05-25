<?php

Yii::import('common.models.db._base.BaseCategoriesModel');

class CategoriesModel extends BaseCategoriesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}