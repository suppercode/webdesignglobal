<?php
class CommonController extends BackendApplicationController
{
	public static function actionRenalias()
	{
		$title = Yii::app()->request->getParam('title');
		$alias['title'] = StringCommon::str_normalizer($title);
		echo CJSON::encode($alias);
		Yii::app()->end();
	}
}