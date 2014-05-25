<?php

Yii::import('common.models.db._base.BaseBannersModel');

class BannersModel extends BaseBannersModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}