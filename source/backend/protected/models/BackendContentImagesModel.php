<?php

Yii::import('common.models.db.ContentImagesModel');

class BackendContentImagesModel extends ContentImagesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}