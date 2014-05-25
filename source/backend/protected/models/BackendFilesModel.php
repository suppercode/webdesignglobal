<?php

Yii::import('common.models.db.FilesModel');

class BackendFilesModel extends FilesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}