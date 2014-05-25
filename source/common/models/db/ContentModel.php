<?php

Yii::import('common.models.db._base.BaseContentModel');

class ContentModel extends BaseContentModel
{
	const STATUS_DRAFT=0;
	const STATUS_PUBLISHED=1;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function defaultScope()
	{
		return array(
				'order'		=>$this->getTableAlias(false, false).'.id desc',
				'condition'	=>$this->getTableAlias(false, false).".type='post'",
		);
	}
	public function scopes()
	{
		return array(
				'published'=>array(
						'condition'=>'status='.self::STATUS_PUBLISHED,
				),
				'draft'=>array(
						'condition'=>'status='.self::STATUS_DRAFT,
				),
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'author' 		=> array(self::BELONGS_TO, 'UsersModel', 'created_by'),
				'category' 		=> array(self::BELONGS_TO, 'CategoriesModel', 'catid'),
				'comments' 		=> array(self::HAS_MANY, 'CommentModel', 'id', 'condition'=>'tbl_comment.status='.CommentModel::STATUS_APPROVED, 'order'=>'tbl_comment.create_time DESC'),
				'commentCount' 	=> array(self::STAT, 'CommentModel', 'post_id', 'condition'=>'status='.CommentModel::STATUS_APPROVED),
				'files'			=> array(self::HAS_MANY, 'ContentFilesModel', 'content_id')
		);
	}
}