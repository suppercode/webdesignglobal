<?php

Yii::import('common.models.db.PollChoiceModel');

class BackendPollChoiceModel extends PollChoiceModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}