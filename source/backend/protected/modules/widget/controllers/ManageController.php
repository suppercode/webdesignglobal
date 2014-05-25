<?php
/**
 * @name Widgets Controller
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class ManageController extends BackendApplicationController {

	public $layout = 'application.modules.widget.views.layouts.widget';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Widgets Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendWidgetsModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendWidgetsModel;
		$widget_name = Yii::app()->request->getParam('name');
		$this->performAjaxValidation($model, 'widgets-form');

		if (isset($_POST['BackendWidgetsModel'])) {
			$model->attributes = $_POST['BackendWidgetsModel'];
			$model->created_by 	= Yii::app()->user->id;
			$model->created = date('Y-m-d H:i:s');
			
			$widgetClass = new $_POST['widget'];
			$model->params = $widgetClass->getParams($_POST);
			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}
		$this->render('create', array( 'model' => $model, 'widget_name'=>$widget_name));
	}
	public function actionSelect()
	{
		$widgets = Yii::app()->params['widgets'];
		$this->render('select',array('widgets'=>$widgets));
	}
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendWidgetsModel');
			
		$this->performAjaxValidation($model, 'widgets-form');

		if (isset($_POST['BackendWidgetsModel'])) {
			$model->attributes = $_POST['BackendWidgetsModel'];
			
			$widgetClass = new $_POST['widget'];
			$model->params = $widgetClass->getParams($_POST);
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
			$this->loadModel($id, 'BackendWidgetsModel')->delete();

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
						$model = $this->loadModel($id, 'BackendWidgetsModel');
						$model->delete();
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendWidgetsModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model = new BackendWidgetsModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendWidgetsModel']))
			$model->attributes = $_GET['BackendWidgetsModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}
	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'BackendWidgetsModel');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
 
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}