<?php

class ContentImagesController extends BackendApplicationController {

	public $layout = 'application.modules.news.views.layouts.news';
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendContentImagesModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendContentImagesModel;

		$this->performAjaxValidation($model, 'content-images-form');

		if (isset($_POST['BackendContentImagesModel'])) {
			$model->attributes = $_POST['BackendContentImagesModel'];

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
		$model = $this->loadModel($id, 'BackendContentImagesModel');

		$this->performAjaxValidation($model, 'content-images-form');
		if (isset($_POST['BackendContentImagesModel'])) {
			$model->attributes = $_POST['BackendContentImagesModel'];

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
			$this->loadModel($id, 'BackendContentImagesModel')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionDelMulti()
	{
		if(Yii::app()->request->isPostRequest){
			$arr_Id = Yii::app()->request->getParam('data');
			if(strpos($arr_Id,':')!==false){
				$arrid = explode(':', $arr_Id);
			}else{
				$arrid[]=$arr_Id;
			}
				
				foreach ($arrid as $id){
					if(is_numeric($id)){
						$model = $this->loadModel($id, 'BackendContentImagesModel');
						$model->delete();
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendContentImagesModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendContentImagesModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendContentImagesModel']))
			$model->attributes = $_GET['BackendContentImagesModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}