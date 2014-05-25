<?php

Yii::import('common.models.db.PollModel');

class BackendPollModel extends PollModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}