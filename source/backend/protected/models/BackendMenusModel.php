<?php

Yii::import('common.models.db.MenusModel');

class BackendMenusModel extends MenusModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}