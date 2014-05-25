<?php

Yii::import('common.models.db.ContentFilesModel');

class BackendContentFilesModel extends ContentFilesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function getFileByContent($contentId)
	{
		$sql = "SELECT c1.*
				FROM tbl_files c1
				INNER JOIN tbl_content_files c2 ON c1.id=c2.file_id
				WHERE c2.content_id=:cid
				";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':cid', $contentId);
		return $command->queryAll();
	}
}