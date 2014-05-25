<?php

Yii::import('common.models.db._base.BaseUsersModel');

class UsersModel extends BaseUsersModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}