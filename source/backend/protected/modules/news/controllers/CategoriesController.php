<?php
class CategoriesController extends BackendApplicationController 
{
	public $layout = 'application.modules.news.views.layouts.news';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Categories Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendCategoriesModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendCategoriesModel();


		if (isset($_POST['BackendCategoriesModel'])) {
			$model->attributes = $_POST['BackendCategoriesModel'];
			
			$model->created_by 	= Yii::app()->user->id;
			$model->modified_by = Yii::app()->user->id;
			$model->created = date('Y-m-d H:i:s');
			
			if ($model->save()) {
				Yii::app()->user->setFlash('success','The categories was successfully created.');
				BackendCategoriesModel::updateTree();
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else{
					if($_POST['apply']==1){
						$this->redirect(array('update', 'id' => $model->id));
					}else{
						$this->redirect(array('view', 'id' => $model->id));
					}
				}
			}else{
				Yii::app()->user->setFlash('error','The categories was failed created.');
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendCategoriesModel');

		if (isset($_POST['BackendCategoriesModel'])) {
			$model->attributes = $_POST['BackendCategoriesModel'];
			$model->modified_by = Yii::app()->user->id;
			if ($model->save()) {
				Yii::app()->user->setFlash('success','The categories was successfully updated.');
				BackendCategoriesModel::updateTree();
				if($_POST['apply']==1){
						$this->redirect(array('update', 'id' => $model->id));
					}else{
						$this->redirect(array('view', 'id' => $model->id));
					}
			}else{
				Yii::app()->user->setFlash('error','The categories was failed updated.');
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'BackendCategoriesModel')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendCategoriesModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendCategoriesModel('search');
		$model->unsetAttributes();
		if (isset($_GET['BackendCategoriesModel']))
			$model->attributes = $_GET['BackendCategoriesModel'];
		
		$this->render('admin', array(
			'model' => $model
		));
	}
	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'BackendCategoriesModel');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
 
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}