<?php

Yii::import('common.models.db.SettingsModel');

class AdminSettingsModel extends SettingsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}