<?php

Yii::import('common.models.db.SystemSettingsModel');

class BackendSystemSettingsModel extends SystemSettingsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}