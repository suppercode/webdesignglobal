<?php

Yii::import('common.models.db.CommentModel');

class BackendCommentModel extends CommentModel
{
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'article' => array(self::BELONGS_TO, 'BackendNewsModel', 'post_id', 'condition'=>'status='.BackendNewsModel::STATUS_PUBLISHED),
		);
	}
}