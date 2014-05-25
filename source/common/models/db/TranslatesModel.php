<?php

Yii::import('common.models.db._base.BaseTranslatesModel');

class TranslatesModel extends BaseTranslatesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}