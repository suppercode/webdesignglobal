<?php
/**
 * @name AdsClientsController
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class CustomersController extends BackendApplicationController
{

	public $layout = 'application.modules.banners.views.layouts.banner';
	public function init()
	{
		parent::init();
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendBannersClientsModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendBannersClientsModel;


		if (isset($_POST['BackendBannersClientsModel'])) {
			$model->attributes = $_POST['BackendBannersClientsModel'];

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
		$model = $this->loadModel($id, 'BackendBannersClientsModel');


		if (isset($_POST['BackendBannersClientsModel'])) {
			$model->attributes = $_POST['BackendBannersClientsModel'];

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
			$this->loadModel($id, 'BackendBannersClientsModel')->delete();

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
						$model = $this->loadModel($id, 'BackendBannersClientsModel');
						$model->delete();
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendBannersClientsModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendBannersClientsModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendBannersClientsModel']))
			$model->attributes = $_GET['BackendBannersClientsModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'BackendBannersClientsModel');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
 
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}