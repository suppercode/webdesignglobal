<?php

Yii::import('common.models.db._base.BaseGalleryCategoryModel');

class GalleryCategoryModel extends BaseGalleryCategoryModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'items'	=> 	array(self::HAS_MANY, 'GalleryItemsModel', 'catid'),
		);
	}
}