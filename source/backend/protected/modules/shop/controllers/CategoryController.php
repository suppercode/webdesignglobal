<?php

class CategoryController extends BackendApplicationController
{
	public $_model;

	public function beforeAction($action) {
		$this->layout = Shop::module()->layout;
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$id = Yii::app()->request->getParam('id',0);
		$this->render('view',array(
			'model'=>$this->loadModel($id, 'Category'),
		));
	}

	public function actionCreate()
	{
		$model=new Category;

		$this->performAjaxValidation($model, 'category-form');

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if($model->save()){
				$id = $model->category_id;
				$this->upload($_FILES['file'], $id);
				Yii::app()->user->setFlash('success','Created success!');
				$this->redirect(array('/shop/category/admin'));
			}else{
				Yii::app()->user->setFlash('error','Created fail!');
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$id = Yii::app()->request->getParam('id',0);
		$model=$this->loadModel($id, 'Category');

		$this->performAjaxValidation($model, 'category-form');

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			$model->alias = (!empty($_POST['Category']['alias']))?$_POST['Category']['alias']:StringCommon::str_normalizer($_POST['Category']['title']);
			if($model->save()){
				$this->upload($_FILES['file'], $id);
				Yii::app()->user->setFlash('success','Updated success!');
				$this->redirect(array('/shop/category/admin'));
			}else{
				Yii::app()->user->setFlash('error','Updated fail!');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id, 'Category')->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Category');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Category('search');
		$model->unsetAttributes();
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/**
	 * upload thumb image
	 */
	private function upload($file, $id)
	{
		if(isset($file)){
			$foo = new Upload($file);
			if ($foo->uploaded) {
				switch ($file['type']){
					case 'image/gif':
						$fileType = '.gif';
						break;
					case 'image/png':
						$fileType = '.png';
						break;
					default:
						$fileType = '.jpg';
						break;
				}
				$fileName = 'category_'.$id;
				$foo->file_new_name_body = $fileName;
				$foo->image_resize = true;
				$foo->image_x = Yii::app()->params['shop']['category_thumb_width'];
				$foo->image_ratio_y = true;
				$path = Yii::app()->params['shop_path']."/category/thumb/";
				$foo->Process($path);
				if ($foo->processed) {
					echo 'image renamed, resized x=100 and converted to GIF';
					$foo->Clean();
					$model = Category::model()->findByPk($id);
					$model->image = '/category/thumb/'.$fileName.$fileType;
					$model->save();
				} else {
					echo 'error : ' . $foo->error;
				}
			}
		}
	}

}
