<?php

class ContactController extends BackendApplicationController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ContactModel'),
		));
	}

	public function actionCreate() {
		$model = new ContactModel;


		if (isset($_POST['ContactModel'])) {
			$model->setAttributes($_POST['ContactModel']);

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
		$model = $this->loadModel($id, 'ContactModel');


		if (isset($_POST['ContactModel'])) {
			$model->setAttributes($_POST['ContactModel']);

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
			$this->loadModel($id, 'ContactModel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ContactModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ContactModel('search');
		$model->unsetAttributes();

		if (isset($_GET['ContactModel']))
			$model->setAttributes($_GET['ContactModel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}