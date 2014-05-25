<?php

Yii::import('common.models.db._base.BaseAnswersModel');

class AnswersModel extends BaseAnswersModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'ask' 		=> array(self::BELONGS_TO, 'AskModel', 'ask_id'),
		);
	}
}