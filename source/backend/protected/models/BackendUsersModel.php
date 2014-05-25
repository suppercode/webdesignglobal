<?php

Yii::import('common.models.db.UsersModel');

class BackendUsersModel extends UsersModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}