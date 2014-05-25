<?php

Yii::import('common.models.db.GalleryCategoryModel');

class BackendGalleryCategoryModel extends GalleryCategoryModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}