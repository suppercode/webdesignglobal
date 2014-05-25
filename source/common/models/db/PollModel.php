<?php

Yii::import('common.models.db._base.BasePollModel');

class PollModel extends BasePollModel
{
	/**
	 * @var integer representing a closed poll status
	 */
	const STATUS_CLOSED = 0;
	
	/**
	 * @var integer representing an open poll status
	 */
	const STATUS_OPEN = 1;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	/**
	 * @return array additional query scopes
	 */
	public function scopes()
	{
		return array(
				'open'=>array(
						'condition'=>'status='. self::STATUS_OPEN,
				),
				'closed'=>array(
						'condition'=>'status='. self::STATUS_CLOSED,
				),
				'latest'=>array(
						'order'=>'id DESC',
				),
		);
	}
	
}