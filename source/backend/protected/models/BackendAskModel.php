<?php

Yii::import('common.models.db.AskModel');

class BackendAskModel extends AskModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}