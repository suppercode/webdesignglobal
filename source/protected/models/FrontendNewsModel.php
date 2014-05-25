<?php

Yii::import('common.models.db.ContentModel');

class FrontendNewsModel extends ContentModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/* public function behaviors()
	{
		return array('translate'=>'application.components.STranslateableBehavior' );
	}
	public function translate()
	{
		// List of model attributes to translate
		return array('introtext', 'title','fulltext','alias'); //Example
	} */
	public static function getArticleByCatAlias($cat_alias, $limit=null, $offset=0, $where='',$order='')
	{
		$limit = ($limit!=null)?" LIMIT $limit OFFSET $offset" :"";
		$order = ($order!='')?$order:'ORDER BY tc.id DESC';
		$sql = "SELECT tc.title, tc.id, tc.images, tc.introtext, tc.alias, tc.catid, tc.*, cc.alias as cat_alias
				FROM tbl_content as tc
				LEFT JOIN  tbl_categories as cc ON tc.catid = cc.id
				WHERE tc.status=".parent::STATUS_PUBLISHED." AND tc.type='post' AND cc.alias=:p $where
					$order
					$limit
					";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $cat_alias);
		//return FNews::model()->with('category')->findAllBySql($sql, array(':p'=>$cat_alias));
		return $command->queryAll();
	}
	public static function getArticleByCat($catId, $limit=null, $offset=0, $where='',$order='')
	{
		$limit = ($limit!=null)?" LIMIT $limit OFFSET $offset" :"";
		$order = ($order!='')?$order:'ORDER BY tc.id DESC';
		$sql = "SELECT tc.title, tc.id, tc.images, tc.introtext, tc.alias, tc.catid, tc.*, cc.alias as cat_alias
				FROM tbl_content as tc
				LEFT JOIN  tbl_categories as cc ON tc.catid = cc.id
				WHERE tc.status=".parent::STATUS_PUBLISHED." AND tc.type='post' AND cc.id=:p $where
					$order
					$limit
					";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $catId);
		return $command->queryAll();
	}
	public static function getTotalArticleByCat($catId, $where='')
	{
		$sql = "SELECT count(*) as total
				FROM tbl_content as tc
				LEFT JOIN  tbl_categories as cc ON tc.catid = cc.id
				WHERE tc.status=".self::STATUS_PUBLISHED." AND tc.type='post' AND cc.id=:p $where
				";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $catId);
		$result = $command->queryRow();
		return $result['total'];
	}
	public static function getArticle($limit=null, $offset=0, $where='',$order='')
	{
		$limit = ($limit!=null)?" LIMIT $limit OFFSET $offset" :"";
		$order = ($order!='')?$order:'ORDER BY tc.id DESC';
		$sql = "SELECT tc.*
				FROM tbl_content as tc
				WHERE tc.status=".parent::STATUS_PUBLISHED." AND tc.type='post' $where
					$order
					$limit
					";
		$command = Yii::app()->db->createCommand($sql);
		return $command->queryAll();
	}
}