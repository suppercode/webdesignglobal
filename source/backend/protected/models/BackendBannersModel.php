<?php

Yii::import('common.models.db.BannersModel');

class BackendBannersModel extends BannersModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function beforeSave()
	{
		$this->update_time = new CDbExpression('NOW()');
		return parent::beforeSave();
	}
}