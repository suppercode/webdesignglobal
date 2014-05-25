<?php

Yii::import('common.models.db._base.BasePollChoiceModel');

class PollChoiceModel extends BasePollChoiceModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/**
	 * @return array default scope.
	 */
	public function defaultScope()
	{
		return array(
				'order' => 'weight ASC, label ASC',
		);
	}
}