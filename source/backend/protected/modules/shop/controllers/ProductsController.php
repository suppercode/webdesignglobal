<?php
/**
 * @name ProductsController
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class ProductsController extends BackendApplicationController
{
	public $_model;
	function init(){
		parent::init();
	  if(isset($_POST['SESSION_ID'])){
	    $session=Yii::app()->getSession();
	    $session->close();
	    $session->sessionID = $_POST['SESSION_ID'];
	    $session->open();
	  }
	}
	public function beforeAction($action) {
		$this->layout = Shop::module()->layout;
		return parent::beforeAction($action);
	}

	public function actionView()
	{
		$id = Yii::app()->request->getParam('id');
		$this->render('view',array(
			'model'=>$this->loadModel($id, 'Products'),
		));
	}

	public function actionCreate()
	{
		$model=new Products;

		 $this->performAjaxValidation($model, 'products-form');

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);

			$model->category_id=1;
			if($model->save()){
				BackendShopProductCategoryModel::model()->updateProductAndCategory($model->product_id, $_POST['category_id']);
				Yii::app()->user->setFlash('success', Shop::t('Created success!'));
				if($_POST['apply']==1){
						$this->redirect(array('update', 'id' => $model->product_id));
					}else{
						$this->redirect(array('admin', 'id' => $model->product_id));
					}
			}else{
				Yii::app()->user->setFlash('success', Shop::t('Created fail!'));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id, $return = null)
	{
		$model=$this->loadModel($id, 'Products');

		$this->performAjaxValidation($model, 'products-form');

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if(isset($_POST['Specifications']))
				$model->setSpecifications($_POST['Specifications']);
			if(isset($_POST['Variations']))
				$model->setVariations($_POST['Variations']);
			$model->category_id=1;
			if($model->save())
			{
				BackendShopProductCategoryModel::model()->updateProductAndCategory($id, $_POST['category_id']);
				Yii::app()->user->setFlash('success', Shop::t('Updated success!'));
				if($_POST['apply']==1){
						$this->redirect(array('update', 'id' => $model->product_id));
					}else{
						$this->redirect(array('admin'));
					}
			}else{
				Yii::app()->user->setFlash('success', Shop::t('Updated fail!'));
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
			Products::model()->beforeDeleteFix($id);
			Products::model()->deleteByPk($id);

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
			Yii::app()->end();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Products');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Products('search');
		$model->unsetAttributes();
		if(isset($_GET['Products']))
			$model->attributes=$_GET['Products'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionToggle($id,$attribute)
	{
        // we only allow deletion via POST request
        $model = $this->loadModel($id,'Products');
        ($model->$attribute==1)?$model->$attribute=0:$model->$attribute=1;
        $model->save();
 
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        
    }
    public function actionDelimage()
    {
    	$productId = Yii::app()->request->getParam('productId');
    	$field = Yii::app()->request->getParam('field');
    	
    	$model=$this->loadModel($productId, 'Products');
    	$media_path = Yii::app()->params['shop_path'];
    	$directory = array_keys(Yii::app()->params['shop']['images']);
    	@unlink($media_path.'/full/'.$model->$field);
    	foreach ($directory as $dir){
			if(is_file($media_path.'/'.$dir.'/'.$model->$field)){
				@unlink($media_path.'/'.$dir.'/'.$model->$field);
			}
		}
		$model->$field = "";
		$model->save();
    	$data['error'] = false;
    	echo CJSON::encode($data);
    }
    /**
     * upload image primary for product
     */
	public function actionUpload()
	{
		if(isset($_POST['ProductImage'])){
			$id = $_POST['model_id'];
			if(isset($_FILES['ProductImage']['name']['image']) && !empty($_FILES['ProductImage']['name']['image']))
			{
				$field = 'image';
			}else if(isset($_FILES['ProductImage']['name']['image2']) && !empty($_FILES['ProductImage']['name']['image2']))
			{
				$field = 'image2';
			}else if(isset($_FILES['ProductImage']['name']['image3']) && !empty($_FILES['ProductImage']['name']['image3']))
			{
				$field = 'image3';
			}else if(isset($_FILES['ProductImage']['name']['image4']) && !empty($_FILES['ProductImage']['name']['image4']))
			{
				$field = 'image4';
			}
			$directory = array_keys(Yii::app()->params['shop']['images']);
			$media_path = Yii::app()->params['shop_path'];
			//get file type and check avaiable
			
			$file = $_FILES['ProductImage']['name'][$field];
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
				
				$myPicture=CUploadedFile::getInstanceByName("ProductImage[$field]");
				
				$image_name = Common::EncryptClientId($id).time().'_'.$field.'.'.$ext_file;
				
				$dir_full = $media_path.'/full';
				if(is_dir($dir_full)==false) mkdir($dir_full);
				
				if($myPicture->saveAs($dir_full.'/'.$image_name)){
					//update to db
					//$model = new Products($id);
					$model = $this->loadModel($id, 'Products');
					//echo 'error_file_upload';echo $model->image;die('dcm');
					if($model->$field!=''){
						foreach ($directory as $dir){
							@unlink($media_path.'/full/'.$model->$field);
							if(is_file($media_path.'/'.$dir.'/'.$model->$field)){
								@unlink($media_path.'/'.$dir.'/'.$model->$field);
							}
						}
					}
					//resize
					foreach ($directory as $dir){
						$image = Yii::app()->image->load($dir_full.'/'.$image_name);
						//$image->resize($_POST['size_x'], $_POST['size_y']);
						$width = Yii::app()->params['shop']['images'][$dir]['width'];
						$sub_dir = $media_path.'/'.$dir;
						if(is_dir($sub_dir)==false) {
							mkdir($sub_dir); chmod($sub_dir, 0777);
						}
						$image->resize($width, NULL);
						$image->save($sub_dir.'/'.$image_name);
					}
					$model->$field = $image_name;
					$model->save();
					echo Yii::app()->params['shop_url'].'/'.$directory[0].'/'.$image_name;
					
				}else{
				     echo 'error_file_upload';
				     Yii::app()->end();
				}
			}
	  	}
	  	Yii::app()->end();
	}
}
