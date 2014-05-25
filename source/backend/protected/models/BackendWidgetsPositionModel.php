<?php

Yii::import('common.models.db.WidgetsPositionModel');

class BackendWidgetsPositionModel extends WidgetsPositionModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function scopes()
	{
		return array(
				'published'=>array(
						'condition'=>'published=1',
				),
		);
	}
}