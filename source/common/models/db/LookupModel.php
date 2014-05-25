<?php

Yii::import('common.models.db._base.BaseLookupModel');

class LookupModel extends BaseLookupModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}