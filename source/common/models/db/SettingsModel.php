<?php

Yii::import('common.models.db._base.BaseSettingsModel');

class SettingsModel extends BaseSettingsModel
{
	const SYSTEM = 0;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}