<?php
/**
 * @name AdsController
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class BannerController extends BackendApplicationController {

	public $layout = 'application.modules.banners.views.layouts.banner';
	public function init()
	{
		parent::init();
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendBannersModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendBannersModel;


		if (isset($_POST['BackendBannersModel'])) {
			echo '<pre>';print_r($_FILES['BackendBannersModel']);
			$file = array();
			foreach ($_FILES['BackendBannersModel'] as $key => $value){
				$file[$key]=$value['content'];
			}
			$Upload = new Upload($file);
			$Upload->jpeg_quality  = 100;
			$Upload->no_script     = false;
			$Upload->image_resize  = true;
			$Upload->image_x       = 700;
			$Upload->image_y       = 500;
			$Upload->image_ratio   = true;
			$fileName = time();
			$destPath = Yii::app()->params['banner']['banner_path'];
			if ($Upload->uploaded) {
				$Upload->file_new_name_body = $fileName;
				$result = $Upload->process($destPath);
				var_dump($result);
			}
			die();
			$model->attributes = $_POST['BackendBannersModel'];

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
		$model = $this->loadModel($id, 'BackendBannersModel');


		if (isset($_POST['BackendBannersModel'])) {
			$model->attributes = $_POST['BackendBannersModel'];

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
			$this->loadModel($id, 'BackendBannersModel')->delete();

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
						$model = $this->loadModel($id, 'BackendBannersModel');
						$model->delete();
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendBannersModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	
	public function actionAdmin() {
		$model = new BackendBannersModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendBannersModel']))
			$model->attributes = $_GET['BackendBannersModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}