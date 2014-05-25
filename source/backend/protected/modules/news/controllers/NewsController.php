<?php
Yii::import("ext.xupload.models.XUploadForm");
class NewsController extends BackendApplicationController
{
	public $layout = 'application.modules.news.views.layouts.news';
	function init(){
		parent::init();
	  if(isset($_POST['SESSION_ID'])){
	    $session=Yii::app()->getSession();
	    $session->close();
	    $session->sessionID = $_POST['SESSION_ID'];
	    $session->open();
	  }
	  $this->pageTitle = Yii::t("main","Articles Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendNewsModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendNewsModel();
		if (isset($_POST['BackendNewsModel'])) {
			$model->attributes = $_POST['BackendNewsModel'];
			$model->created_by 	= Yii::app()->user->id;
			$model->modified_by = Yii::app()->user->id;
			if ($model->save()) {
				if (Yii::app()->request->isAjaxRequest)
					Yii::app()->end();
				else{
					if($_POST['apply']==1){
						$this->redirect(array('update', 'id' => $model->id));
					}else{
						$this->redirect(array('view', 'id' => $model->id));
					}
					
				}
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendNewsModel');
		if (isset($_POST['BackendNewsModel'])) {
			$model->attributes = $_POST['BackendNewsModel'];
			
			$model->modified_by = Yii::app()->user->id;
			if ($model->save()) {
				Yii::app()->user->setFlash('success','Edit was successfully updated.');
				if($_POST['apply']==1){
						$this->redirect(array('update', 'id' => $model->id));
					}else{
						$this->redirect(array('view', 'id' => $model->id));
					}
			}else{
				Yii::app()->user->setFlash('error','Edit was failed.');
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			$model = $this->loadModel($id, 'BackendNewsModel');
			if($model->images!=''){
				$images = unserialize($model->images);
				if(count($images)>0){
					foreach ($images as $value){
						@unlink(Yii::app()->params['site_path'].$value['url']);
					}
				}
			}
			$model->delete();
			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionDelimage()
	{
		$id = Yii::app()->request->getParam('id');
		$type = Yii::app()->request->getParam('type');
		$model = $this->loadModel($id, 'BackendNewsModel');
		$images = unserialize($model->images);
		$file = $images[$type]['url'];
		unset($images[$type]);
		$model->images = serialize($images);
		if($model->save()){
			$url = Yii::app()->params['site_path'].$file;
			@unlink($url);
		}
		$data['error'] = false;
		echo CJSON::encode($data);
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
						$model = $this->loadModel($id, 'BackendNewsModel');
						if($model->images!=''){
							$images = unserialize($model->images);
							if(count($images)>0){
								foreach ($images as $value){
									@unlink(Yii::app()->params['site_path'].$value['url']);
								}
							}
						}
						$model->delete();
					}
				}
		}else 
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendNewsModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendNewsModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendNewsModel']))
			$model->attributes = $_GET['BackendNewsModel'];
		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	public function actionUpload()
	{
		if(isset($_POST['myPicture'])){
			$id = $_POST['model_id'];
			$name = array_keys($_POST['myPicture']);
			//get file type and check avaiable
			
			$file = $_FILES['myPicture']['name'][$name[0]];
			$file = utf8_decode($file);
			$file = preg_replace("/[^a-zA-Z0-9_.\-\[\]]/i", "", strtr($file, "()áàâãäéèêëíìîïóòôõöúùûüçÁÀÂÃÄÉÈÊËÍÌÎÏÓÒÔÕÖÚÙÛÜÇ% ", "[]aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC__"));
			$file = strtolower($file);
			$filepath = pathinfo($file);
			$file_type_avaiable = $_POST['fileext'];
			$ext_file = $filepath['extension'];
			//check file type is avaiable?
				$fileTypes = str_replace('*.','',$file_type_avaiable);
				$fileTypes = str_replace(';','|',$fileTypes);
				$typesArray = @split('\|',$fileTypes);
			if (!in_array($ext_file,$typesArray)) { 
				echo 'error_file_type';
				Yii::app()->end();
			}else{
			
				$myPicture=CUploadedFile::getInstanceByName("myPicture[$name[0]]");
				
				$image_name = Common::EncryptClientId($id).time().'_'.$name[0].'.'.$ext_file;
				$dir = Yii::app()->params['storage_path'].'/media/news/'.$name[0];
				if(is_dir($dir)==false) mkdir($dir);
				if($myPicture->saveAs($dir.'/'.$image_name)){
					//resize
					if($_POST['autoresize']==true){
						$data = array();
						$image = Yii::app()->image->load($dir.'/'.$image_name);
						$image->resize($_POST['size_x'], $_POST['size_y']);
						$image->save($dir.'/'.$image_name);
					}
					//update to db
					$model = $this->loadModel($id, 'BackendNewsModel');
					$Images = ($model->images!='')?unserialize($model->images):array();
					if(count($Images)>0 && isset($Images[$name[0]]['url']) && $Images[$name[0]]['url']!=''){
						@unlink(Yii::app()->params['storage_url'].$Images[$name[0]]['url']);
					}
					$Images[$name[0]]['url'] = '/media/news/'.$name[0].'/'.$image_name;
					$Images[$name[0]]['ext'] = $ext_file;
					$model->images = serialize($Images);
					$model->save();
					echo Yii::app()->params['storage_url'].'/media/news/'.$name[0].'/'.$image_name;
				}else{
				     echo 'error_file_upload';
				     Yii::app()->end();
				}
			}
	  	}
	  	Yii::app()->end();
	}
	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'BackendNewsModel');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
 
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}