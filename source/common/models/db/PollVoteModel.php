<?php

Yii::import('common.models.db._base.BasePollVoteModel');

class PollVoteModel extends BasePollVoteModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}