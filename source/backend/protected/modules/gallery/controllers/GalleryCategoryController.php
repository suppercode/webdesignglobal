<?php
/**
 * @name GalleryCategoryController
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class GalleryCategoryController extends BackendApplicationController {

	public $layout = 'application.modules.gallery.views.layouts.gallery';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Gallery Categories Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendGalleryCategoryModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendGalleryCategoryModel;

		if (isset($_POST['BackendGalleryCategoryModel'])) {
			$model->attributes = $_POST['BackendGalleryCategoryModel'];

			if ($model->save()) {
				if(isset($_FILES) && $_FILES['image']['error']!=4){
					$last_id = $model->getPrimaryKey();
					$ext = Yii::app()->params['images_available']['type'][$_FILES['image']['type']];
					$name = str_replace(".$ext", '', $_FILES['image']['name']);
					$image_name = $last_id.'_cat_'.$name.'.'.$ext;
					$file_upload=CUploadedFile::getInstanceByName("image");
					
					$folder_gallery = Yii::app()->params['gallery_path'];
					$dir = $folder_gallery.'/category/source';
					if(is_dir($dir)==false) mkdir($dir);
					if($file_upload->saveAs($dir.'/'.$image_name)){
						//resize
						$dir_thumb = $folder_gallery.'/category/thumb';
						$image = Yii::app()->image->load($dir.'/'.$image_name);
						$t_width 	= Yii::app()->params['images_available']['thumb']['width'];
						$t_height 	= Yii::app()->params['images_available']['thumb']['height'];
						$image->resize($t_width, $t_height);
						$image->save($dir_thumb.'/'.$image_name);
						//end resize
						BackendGalleryCategoryModel::model()->updateByPk($last_id, array('image'=>$image_name));
					}
				}
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				
				Yii::app()->user->setFlash('success',Yii::t('main','Updated success!'));
				if(isset($_POST['apply']) && $_POST['apply']==1)
						$this->redirect(array('update', 'id' => $model->id));
					else
						$this->redirect(array('view', 'id' => $model->id));
			}else{
					Yii::app()->user->setFlash('error',Yii::t('main','Updated fail!'));
				}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendGalleryCategoryModel');


		if (isset($_POST['BackendGalleryCategoryModel'])) {
			$model->attributes = $_POST['BackendGalleryCategoryModel'];
		if(isset($_FILES) && $_FILES['image']['error']==0){
				$ext = Yii::app()->params['images_available']['type'][$_FILES['image']['type']];
				$name = str_replace(".$ext", '', $_FILES['image']['name']);
				$image_name = $model->id.'_cat_'.$name.'.'.$ext;
				$file_upload=CUploadedFile::getInstanceByName("image");
				
				$folder_gallery = Yii::app()->params['gallery_path'];
				$dir = $folder_gallery.'/category/source';
				if(is_dir($dir)==false) @mkdir($dir);
				if($file_upload->saveAs($dir.'/'.$image_name)){
					
					//resize thumb
					$dir_thumb = $folder_gallery.'/category/thumb';
					$image = Yii::app()->image->load($dir.'/'.$image_name);
					$t_width 	= Yii::app()->params['images_available']['thumb']['width'];
					$t_height 	= Yii::app()->params['images_available']['thumb']['height'];
					$image->resize($t_width, $t_height);
					$image->save($dir_thumb.'/'.$image_name);
					//end resize
					$model->image = $image_name;
				}
				}
			if ($model->save()) {
				Yii::app()->user->setFlash('success',Yii::t('main','Updated success!'));
				if(isset($_POST['apply']) && $_POST['apply']==1)
					$this->redirect(array('update', 'id' => $model->id));
				else
					$this->redirect(array('view', 'id' => $model->id));
			}else{
				Yii::app()->user->setFlash('error',Yii::t('main','Updated fail!'));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$this->loadModel($id, 'BackendGalleryCategoryModel')->delete();

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendGalleryCategoryModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendGalleryCategoryModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendGalleryCategoryModel']))
			$model->attributes = $_GET['BackendGalleryCategoryModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}