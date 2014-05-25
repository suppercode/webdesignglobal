<?php

Yii::import('common.models.db.AnswersModel');

class BackendAnswersModel extends AnswersModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}