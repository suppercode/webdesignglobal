<?php

class ManageController extends BackendApplicationController {

	public $layout = 'application.modules.translate.views.layouts.translate';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Languages Translate");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendTranslatesModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendTranslatesModel;

		if (isset($_POST['BackendTranslatesModel'])) {
			$model->attributes = $_POST['BackendTranslatesModel'];

			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendTranslatesModel');


		if (isset($_POST['BackendTranslatesModel'])) {
			$model->attributes = $_POST['BackendTranslatesModel'];

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'BackendTranslatesModel')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendTranslatesModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendTranslatesModel('search');
		$model->unsetAttributes();
		if (isset($_GET['BackendTranslatesModel']))
			$model->attributes = $_GET['BackendTranslatesModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
}