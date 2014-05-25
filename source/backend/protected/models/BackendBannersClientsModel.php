<?php

Yii::import('common.models.db.BannersClientsModel');

class BackendBannersClientsModel extends BannersClientsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}