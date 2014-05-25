<?php

Yii::import('common.models.db._base.BaseMenuItemsModel');

class MenuItemsModel extends BaseMenuItemsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function relations() {
		return array(
				'type' => array(self::BELONGS_TO, 'MenuItemsTypesModel', 'menutypes'),
				'group'=> array(self::BELONGS_TO, 'MenusModel', "menu_group")
		);
	}
}