<?php

Yii::import('common.models.db.PollVoteModel');

class BackendPollVoteModel extends PollVoteModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}