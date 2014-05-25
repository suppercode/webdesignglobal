<?php

Yii::import('common.models.db.CategoryAskModel');

class BackendCategoryAskModel extends CategoryAskModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}