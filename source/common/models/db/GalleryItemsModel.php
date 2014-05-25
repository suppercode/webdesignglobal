<?php

Yii::import('common.models.db._base.BaseGalleryItemsModel');

class GalleryItemsModel extends BaseGalleryItemsModel
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
			'category'	=> 	array(self::BELONGS_TO, 'GalleryCategoryModel', 'catid'),
		);
	}
}