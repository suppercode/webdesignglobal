<?php

class MenusController extends BackendApplicationController {

	public $layout = 'application.modules.menu.views.layouts.menus';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Menu Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendMenusModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendMenusModel;


		if (isset($_POST['BackendMenusModel'])) {
			$model->attributes = $_POST['BackendMenusModel'];

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
		$model = $this->loadModel($id, 'BackendMenusModel');


		if (isset($_POST['BackendMenusModel'])) {
			$model->attributes = $_POST['BackendMenusModel'];

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
			$model = $this->loadModel($id, 'BackendMenusModel');
			if($model->delete()){
				BackendMenuItemsModel::model()->deleteAll('menu_group=:g', array(':g'=>$id));
				if (!Yii::app()->request->isAjaxRequest)
					$this->redirect(array('admin'));
			}
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendMenusModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendMenusModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendMenusModel']))
			$model->attributes = $_GET['BackendMenusModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}