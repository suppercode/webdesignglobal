<?php

Yii::import('common.models.db._base.BaseContactModel');

class ContactModel extends BaseContactModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}