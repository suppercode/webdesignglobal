<?php
/**
 * @name CommentController
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class ManageController extends BackendApplicationController {

	public $layout = 'application.modules.comment.views.layouts.comment';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Comment Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendCommentModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendCommentModel;


		if (isset($_POST['BackendCommentModel'])) {
			$model->attributes = $_POST['BackendCommentModel'];

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
		$model = $this->loadModel($id, 'BackendCommentModel');


		if (isset($_POST['BackendCommentModel'])) {
			$model->attributes = $_POST['BackendCommentModel'];

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
			$this->loadModel($id, 'Comment')->delete();

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
						$model = $this->loadModel($id, 'BackendCommentModel');
						$model->delete();
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendCommentModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendCommentModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendCommentModel']))
			$model->attributes = $_GET['BackendCommentModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}