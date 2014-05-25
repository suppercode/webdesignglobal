<?php

Yii::import('common.models.db.ContactModel');

class BackendContactModel extends ContactModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}