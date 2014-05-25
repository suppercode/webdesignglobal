<?php

Yii::import('common.models.db.PagesModel');

class FrontendPagesModel extends PagesModel
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
		return array('title','fulltext','alias'); //Example
	} */
	/**
	 * get page by alias folow language
	 */
	public static function getPageByAlias($aliasPage)
	{
		if(isset($_GET['lang']) && $_GET['lang']!='' && $_GET['lang']!=Yii::app()->params['language_default'])
		{
			$field = 'alias_'.$_GET['lang'];
		}else{
			$field = 'alias';
		}
		return self::model()->published()->findByAttributes(array("$field"=>$aliasPage));
	}
}