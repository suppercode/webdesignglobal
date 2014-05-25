<?php

class ShippingMethodController extends BackendApplicationController
{
	public $defaultAction = 'admin';
	public $layout = 'application.modules.shop.views.layouts.setting';

	public function actionChoose() {
		$this->render('choose', array('customer' => Shop::getCustomer()));
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id, 'ShippingMethod'),
		));
	}

	public function actionCreate()
	{
		$model=new ShippingMethod;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ShippingMethod']))
		{
			$model->attributes=$_POST['ShippingMethod'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id, 'ShippingMethod');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ShippingMethod']))
		{
			$model->attributes=$_POST['ShippingMethod'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id, 'ShippingMethod')->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ShippingMethod('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ShippingMethod']))
			$model->attributes=$_GET['ShippingMethod'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

}
