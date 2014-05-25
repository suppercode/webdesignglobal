<?php

Yii::import('common.models.db.ContentModel');

class BackendNewsModel extends ContentModel
{
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
				'author' => array(self::BELONGS_TO, 'iUsers', 'created_by'),
				'comments' => array(self::HAS_MANY, 'BackendCommentModel', 'id', 'condition'=>'tbl_comment.status='.BackendCommentModel::STATUS_APPROVED, 'order'=>'tbl_comment.create_time DESC'),
				'commentCount' => array(self::STAT, 'BackendCommentModel', 'post_id', 'condition'=>'status='.BackendCommentModel::STATUS_APPROVED),
		);
	}
	/**
	 * This is invoked after the record is saved.
	 */
	protected function afterSave()
	{
		parent::afterSave();
	}
	public function beforeSave()
	{
		$this->modified = new CDbExpression('NOW()');
		return parent::beforeSave();
	}
}