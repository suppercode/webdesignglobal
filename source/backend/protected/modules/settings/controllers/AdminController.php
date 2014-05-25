<?php

class AdminController extends BackendApplicationController {

	public function init()
	{
		parent::init();
		$this->pageTitle=Yii::t("main","Settings Manage");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'AdminSettingsModel'),
		));
	}

	public function actionCreate() {
		$model = new AdminSettingsModel;


		if (isset($_POST['AdminSettingsModel'])) {
			$model->setAttributes($_POST['AdminSettingsModel']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->key_code));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'AdminSettingsModel');


		if (isset($_POST['AdminSettingsModel'])) {
			$model->setAttributes($_POST['AdminSettingsModel']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->key_code));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'AdminSettingsModel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('AdminSettingsModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new AdminSettingsModel('search');
		$model->unsetAttributes();

		if (isset($_GET['AdminSettingsModel']))
			$model->setAttributes($_GET['AdminSettingsModel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}