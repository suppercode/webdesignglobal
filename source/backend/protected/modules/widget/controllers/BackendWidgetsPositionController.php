<?php

class BackendWidgetsPositionController extends BackendApplicationController {

	public $layout = 'application.modules.widget.views.layouts.widget';
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendWidgetsPositionModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendWidgetsPositionModel;


		if (isset($_POST['BackendWidgetsPositionModel'])) {
			$model->setAttributes($_POST['BackendWidgetsPositionModel']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendWidgetsPositionModel');


		if (isset($_POST['BackendWidgetsPositionModel'])) {
			$model->setAttributes($_POST['BackendWidgetsPositionModel']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'BackendWidgetsPositionModel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendWidgetsPositionModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendWidgetsPositionModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendWidgetsPositionModel']))
			$model->setAttributes($_GET['BackendWidgetsPositionModel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}