<?php

Yii::import('common.models.db.WidgetsModel');

class BackendWidgetsModel extends WidgetsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function beforeSave()
	{
		$this->modified = new CDbExpression('NOW()');
		$this->modified_by = Yii::app()->user->id;
		
		return parent::beforeSave();
	}
}