<?php

Yii::import('common.models.db.GalleryItemsModel');

class BackendGalleryItemsModel extends GalleryItemsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}