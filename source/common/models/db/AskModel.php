<?php

Yii::import('common.models.db._base.BaseAskModel');

class AskModel extends BaseAskModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'answer' 		=> array(self::HAS_MANY, 'AnswersModel', 'id'),
				'category' 		=> array(self::BELONGS_TO, 'FrontendCategoryAskModel', 'cat_id'),
		);
	}
}