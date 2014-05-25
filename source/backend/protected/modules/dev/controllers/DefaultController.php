<?php

class DefaultController extends BackendApplicationController
{
	public function actions()
	{
		return array(
				'upload'=>array(
						'class'=>'xupload.actions.XUploadAction',
						'path' =>Yii::app() -> getBasePath() . "/../uploads",
						'publicPath' => Yii::app() -> getBaseUrl() . "/../uploads",
				),
		);
	}
	public function actionIndex()
	{
		Yii::import("xupload.models.XUploadForm");
		$model = new XUploadForm;
		$this -> render('index', array('model' => $model, ));
	}
}