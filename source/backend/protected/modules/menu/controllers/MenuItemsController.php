<?php

class MenuItemsController extends BackendApplicationController {

	public $layout = 'application.modules.menu.views.layouts.menus';
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendMenuItemsModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendMenuItemsModel;

		$this->performAjaxValidation($model, 'menu-items-form');

		if (isset($_POST['BackendMenuItemsModel'])) {
			$model->attributes = $_POST['BackendMenuItemsModel'];
			if(isset($_POST['BackendMenuItemsModel']['params'])){
				$param = array();
				
				if(isset($_POST['BackendMenuItemsModel']['params']['p']) && !empty($_POST['BackendMenuItemsModel']['params']['p'])){
					if(strpos($_POST['BackendMenuItemsModel']['params']['p'], '&')!==FALSE){
						$exp = explode('&', $_POST['BackendMenuItemsModel']['params']['p']);
						foreach ($exp as $value){
							$exp2 = explode('=', $value);
							$param["{$exp2[0]}"] = $exp2[1];
						}
					}else{
						$exp = explode('=', $_POST['BackendMenuItemsModel']['params']['p']);
						$param["{$exp[0]}"] = $exp[1];
					}
				}
				$_POST['BackendMenuItemsModel']['params']['p'] = $param;
				$model->params = serialize($_POST['BackendMenuItemsModel']['params']);
			}
			if ($model->save()) {
				BackendMenuItemsModel::updateTree();
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendMenuItemsModel');

		$this->performAjaxValidation($model, 'menu-items-form');

		if (isset($_POST['BackendMenuItemsModel'])) {
			$model->attributes = $_POST['BackendMenuItemsModel'];
			if(isset($_POST['BackendMenuItemsModel']['params'])){
				$param = array();
				if(isset($_POST['BackendMenuItemsModel']['params']['p']) && !empty($_POST['BackendMenuItemsModel']['params']['p'])){
					if(strpos($_POST['MenuItems']['params']['p'], '&')!==FALSE){
						$exp = explode('&', $_POST['MenuItems']['params']['p']);
						foreach ($exp as $value){
							$exp2 = explode('=', $value);
							$param["{$exp2[0]}"] = $exp2[1];
						}
					}else{
						$exp = explode('=', $_POST['BackendMenuItemsModel']['params']['p']);
						$param["{$exp[0]}"] = $exp[1];
					}
				}
				$_POST['BackendMenuItemsModel']['params']['p'] = $param;
				$model->params = serialize($_POST['BackendMenuItemsModel']['params']);
			}
			if ($model->save()) {
				BackendMenuItemsModel::updateTree();
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'BackendMenuItemsModel')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('MenuItems');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendMenuItemsModel('search');
		$model->unsetAttributes();
		if (isset($_GET['BackendMenuItemsModel']))
			$model->attributes = $_GET['BackendMenuItemsModel'];
		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actiongetLayoutType()
	{
		$type = Yii::app()->request->getParam('type');
		$view = BackendMenuItemsTypesModel::model()->findByPk($type)->view;
		$this->renderPartial("application.modules.menu.views.menutypes.".$view);
	}
	
	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'BackendMenuItemsModel');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : Yii::app()->createUrl('/menu/menuItems/admin',array('g'=>$model->menu_group)));
    }
}