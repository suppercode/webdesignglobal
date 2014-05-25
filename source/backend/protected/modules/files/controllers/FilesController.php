<?php

class FilesController extends BackendApplicationController {

	public $layout = 'application.modules.news.views.layouts.news';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Files Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendFilesModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendFilesModel;


		if (isset($_POST['BackendFilesModel'])) {
			$model->setAttributes($_POST['BackendFilesModel']);

			if ($model->save()) {
				if(isset($_FILES['file']))
					$this->uploadFile($_FILES, $model);
				
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendFilesModel');
		
		if (isset($_POST['BackendFilesModel'])) {
			$model->setAttributes($_POST['BackendFilesModel']);

			if ($model->save()) {
				if(isset($_FILES['file']))
					$this->uploadFile($_FILES, $model);
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'BackendFilesModel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendFilesModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendFilesModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendFilesModel']))
			$model->setAttributes($_GET['BackendFilesModel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	private function uploadFile($file, $model)
	{
		//echo '<pre>';print_r($file);die('dcm');
		if(isset($file['file']['error']) && $file['file']['error']==0){
			$ext = explode('.', $file['file']['name']);
			$extFile = $ext[count($ext)-1];
			$id = $model->id;
			$fileName = $model->name.$id.time().".".$extFile;
			$fileSourcePath = Yii::app()->params['files_path'].'/'.$fileName;
			try{
			if(move_uploaded_file($file['file']['tmp_name'], $fileSourcePath)){
				$fileModel = BackendFilesModel::model()->findByPk($id);
				$fileModel->file_type = $file['file']['type'];
				$fileModel->file_size = $file['file']['size'];
				$fileModel->source_path = $fileName;
				$fileModel->save();
			}
			}catch (Exception $e)
			{
				echo $e->getMessage();
			}
		}
		//return true;
	}
	
	public function actionListAjax()
	{
		$this->layout = 'application.modules.menu.views.layouts.ajax';
		$model = new BackendFilesModel('search');
		$model->unsetAttributes();
	
		if (isset($_GET['BackendFilesModel']))
			$model->attributes = $_GET['BackendFilesModel'];
		$this->render('list', array(
				'model' => $model,
		));
	}
	public function actionGetFile()
	{
		$this->layout=false;
		$fileId = Yii::app()->request->getParam('file_id', 0);
		$contentId = Yii::app()->request->getParam('content_id', 0);
		$model = new BackendContentFilesModel;
		$model->setAttribute('content_id', $contentId);
		$model->setAttribute('file_id', $fileId);
		$model->save();
		Yii::app()->end();
	}
	public function actionRemoveFile()
	{
		$this->layout=false;
		$fileId = Yii::app()->request->getParam('file_id', 0);
		$contentId = Yii::app()->request->getParam('content_id', 0);
		$criteria = new CDbCriteria;
		$criteria->condition = "content_id=:cid AND file_id=:fid";
		$criteria->params = array(':cid'=>$contentId, ':fid'=>$fileId);
		$model = BackendContentFilesModel::model()->deleteAll($criteria);
		Yii::app()->end();
	}
}