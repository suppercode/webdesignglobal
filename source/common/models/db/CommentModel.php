<?php

Yii::import('common.models.db._base.BaseCommentModel');

class CommentModel extends BaseCommentModel
{
	const STATUS_PENDING=0;
	const STATUS_APPROVED=1;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}