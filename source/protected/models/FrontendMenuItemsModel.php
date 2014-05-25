<?php

Yii::import('common.models.db.MenuItemsModel');

class FrontendMenuItemsModel extends MenuItemsModel
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
		return array('name', 'alias');
	} */
}