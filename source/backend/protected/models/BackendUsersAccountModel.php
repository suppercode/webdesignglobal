<?php

Yii::import('common.models.db.UsersAccountModel');

class BackendUsersAccountModel extends UsersAccountModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}