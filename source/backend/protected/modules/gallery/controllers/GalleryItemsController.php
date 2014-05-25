<?php
/**
 * @name GalleryItemsController
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class GalleryItemsController extends BackendApplicationController {

	public $layout = 'application.modules.gallery.views.layouts.gallery';
	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Gallery Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendGalleryItemsModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendGalleryItemsModel;


		if (isset($_POST['BackendGalleryItemsModel'])) {
			$model->attributes = $_POST['BackendGalleryItemsModel'];

			if ($model->save()) {
				if(isset($_FILES) && $_FILES['image']['error']!=4){
				$last_id = $model->getPrimaryKey();
				$ext = Yii::app()->params['images_available']['type'][$_FILES['image']['type']];
				$name = str_replace(".$ext", '', $_FILES['image']['name']);
				$image_name = $last_id.$name.'.'.$ext;
				$file_upload=CUploadedFile::getInstanceByName("image");
				
				
				$folder_gallery = Yii::app()->params['gallery_path'];
				$dir = $folder_gallery.'/source';
				if(is_dir($dir)==false) mkdir($dir);
				if($file_upload->saveAs($dir.'/'.$image_name)){
					//resize
					$full_dir = $folder_gallery.'/full';
					$image = Yii::app()->image->load($dir.'/'.$image_name);
					$f_width 	= Yii::app()->params['images_available']['full']['width'];
					$f_height 	= Yii::app()->params['images_available']['full']['height'];
					$image->resize($f_width, $f_height);
					$image->save($full_dir.'/'.$image_name);
					//end resize
					
					//resize
					$thumb_dir = $folder_gallery.'/thumb';
					$image2 = Yii::app()->image->load($dir.'/'.$image_name);
					$t_width 	= Yii::app()->params['images_available']['thumb']['width'];
					$t_height 	= Yii::app()->params['images_available']['thumb']['height'];
					$image2->resize($t_width, $t_height);
					$image2->save($thumb_dir.'/'.$image_name);
					//end resize
					
					BackendGalleryItemsModel::model()->updateByPk($last_id, array('image'=>$image_name));
				}
				}
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else{
					if(isset($_POST['apply']) && $_POST['apply']==1)
						$this->redirect(array('update', 'id' => $model->id));
					else 
						$this->redirect(array('view', 'id' => $model->id));
				}
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendGalleryItemsModel');


		if (isset($_POST['BackendGalleryItemsModel'])) {
			$model->attributes = $_POST['BackendGalleryItemsModel'];
			if(isset($_FILES) && $_FILES['image']['error']==0){
				
				$ext = Yii::app()->params['images_available']['type'][$_FILES['image']['type']];
				$name = str_replace(".$ext", '', $_FILES['image']['name']);
				$image_name = $model->id.$name.'.'.$ext;
				$file_upload=CUploadedFile::getInstanceByName("image");
				
				$folder_gallery = Yii::app()->params['gallery_path'];
				$dir = $folder_gallery.'/source';
				if(is_dir($dir)==false) @mkdir($dir);
				if($file_upload->saveAs($dir.'/'.$image_name)){
					//resize
					$full_dir = $folder_gallery.'/full';
					if(is_dir($full_dir)==false) @mkdir($full_dir);
					$image = Yii::app()->image->load($dir.'/'.$image_name);
					$f_width 	= Yii::app()->params['images_available']['full']['width'];
					$f_height 	= Yii::app()->params['images_available']['full']['height'];
					$image->resize($f_width, $f_height);
					$image->save($full_dir.'/'.$image_name);
					//end resize
					
					//resize
					$thumb_dir = $folder_gallery.'/thumb';
					if(is_dir($thumb_dir)==false) @mkdir($thumb_dir);
					$image2 = Yii::app()->image->load($dir.'/'.$image_name);
					$t_width 	= Yii::app()->params['images_available']['thumb']['width'];
					$t_height 	= Yii::app()->params['images_available']['thumb']['height'];
					$image2->resize($t_width, $t_height);
					$image2->save($thumb_dir.'/'.$image_name);
					//end resize
					$image_old = $model->image;
					$model->image = $image_name;
					@unlink($folder_gallery.'/thumb/'.$image_old);
					@unlink($folder_gallery.'/full/'.$image_old);
					@unlink($folder_gallery.'/source/'.$image_old);
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
			$model = $this->loadModel($id, 'BackendGalleryItemsModel');
			$image = $model->image;
			if($model->delete()){
			@unlink(Yii::app()->params['gallery_path'].'/thumb/'.$image);
			@unlink(Yii::app()->params['gallery_path'].'/full/'.$image);
			}
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
						$model = $this->loadModel($id, 'BackendGalleryItemsModel');
						$image = $model->image;
						if($model->delete()){
							@unlink(Yii::app()->params['gallery'].'/thumb/'.$image);
							@unlink(Yii::app()->params['gallery'].'/full/'.$image);
						}
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendGalleryItemsModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendGalleryItemsModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendGalleryItemsModel']))
			$model->attributes = $_GET['BackendGalleryItemsModel'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

}