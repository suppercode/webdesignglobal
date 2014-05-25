<?php

class PagesController extends BackendApplicationController {

	public $layout = 'application.modules.news.views.layouts.news';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Pages Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendPagesModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendPagesModel;
		if (isset($_POST['BackendPagesModel'])) {
			$model->attributes = $_POST['BackendPagesModel'];
			$model->created_by 	= Yii::app()->user->id;
			if ($model->save()) {
				BackendPagesModel::updateTree();
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendPagesModel');
		if (isset($_POST['BackendPagesModel'])) {
			$model->attributes = $_POST['BackendPagesModel'];
			if ($model->save()) {
				BackendPagesModel::updateTree();
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'BackendPagesModel')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendPagesModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendPagesModel('search');
		$model->unsetAttributes();
		
		if (isset($_GET['BackendPagesModel']))
			$model->attributes = $_GET['BackendPagesModel'];
		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'BackendPagesModel');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
 
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}