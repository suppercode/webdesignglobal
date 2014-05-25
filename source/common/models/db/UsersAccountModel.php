<?php

Yii::import('common.models.db._base.BaseUsersAccountModel');

class UsersAccountModel extends BaseUsersAccountModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}