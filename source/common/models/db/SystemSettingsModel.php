<?php

Yii::import('common.models.db._base.BaseSystemSettingsModel');

class SystemSettingsModel extends BaseSystemSettingsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}