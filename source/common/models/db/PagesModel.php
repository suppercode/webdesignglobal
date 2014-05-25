<?php

Yii::import('common.models.db._base.BaseContentModel');

class PagesModel extends BaseContentModel
{
	const STATUS_DRAFT=0;
	const STATUS_PUBLISHED=1;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function defaultScope()
	{
		return array(
				'order'=>'position ASC',
				'condition'=>"type='page'",
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
}