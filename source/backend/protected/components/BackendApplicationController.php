<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BackendApplicationController extends Controller
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='body';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	protected $_assetsUrl;
	
	public $btnOptions = null;
	public function init(){
		/* $cs=Yii::app()->clientScript;
		$cs->scriptMap=array(
				'jquery.min.js'=>false,
		);
		 */
		//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery-1.6.1.min.js');
		Yii::app()->getClientScript()->registerCoreScript('jquery');
		$dir = Yii::getPathOfAlias('common').DS.'libs/bootstrap';
		$assets = Yii::app()->assetManager->publish($dir, false, -1, YII_DEBUG);
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile("{$assets}/css/bootstrap.min.css");
		$cs->registerScriptFile("{$assets}/js/bootstrap.min.js");
		$cs->registerScriptFile(Yii::app()->theme->baseUrl."/js/core.js");
		//Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/core.js', CClientScript::POS_HEAD);
		parent::init();
	}
	/**
	 * Returns the URL to the published assets folder.
	 * @return string the URL
	 */
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('webroot.themes.default.js');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param mixed $id the ID of the model to be loaded
	 * @param string $modelClass the model class name
	 * @return GxActiveRecord the loaded model
	 */
	public function loadModel($key, $modelClass='') {
		if (is_array($key)) {
			// The key is an array.
			// Check if there are column names indexing the values in the array.
			reset($key);
			if (key($key) === 0) {
				// There are no attribute names.
				// Check if there are multiple PK values. If there's only one, start again using only the value.
				if (count($key) === 1)
					return $this->loadModel($key[0], $modelClass);
	
					// Now we will use the composite PK.
					// Check if the table has composite PK.
					$tablePk = GxActiveRecord::model($modelClass)->getTableSchema()->primaryKey;
					if (!is_array($tablePk))
						throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));
	
						// Check if there are the correct number of keys.
						if (count($key) !== count($tablePk))
							throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));
	
						// Get an array of PK values indexed by the column names.
						$pk = GxActiveRecord::model($modelClass)->fillPkColumnNames($key);
	
						// Then load the model.
						$model = GxActiveRecord::model($modelClass)->findByPk($pk);
			} else {
				// There are attribute names.
				// Then we load the model now.
				$model = GxActiveRecord::model($modelClass)->findByAttributes($key);
			}
		} else {
			// The key is not an array.
			// Check if the table has composite PK.
			$tablePk = GxActiveRecord::model($modelClass)->getTableSchema()->primaryKey;
			if (is_array($tablePk)) {
				// The table has a composite PK.
				// The key must be a string to have a PK separator.
				if (!is_string($key))
					throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));
	
				// There must be a PK separator in the key.
				if (stripos($key, GxActiveRecord::$pkSeparator) === false)
					throw new CHttpException(400, Yii::t('giix', 'Your request is invalid.'));
	
				// Generate an array, splitting by the separator.
				$keyValues = explode(GxActiveRecord::$pkSeparator, $key);
	
				// Start again using the array.
				return $this->loadModel($keyValues, $modelClass);
			} else {
				// The table has a single PK.
				// Then we load the model now.
				$model = GxActiveRecord::model($modelClass)->findByPk($key);
			}
		}
	
		// Check if we have a model.
		if ($model === null)
			throw new CHttpException(404, Yii::t('giix', 'The requested page does not exist.'));
	
		return $model;
	}
	
	protected function performAjaxValidation($model, $form) {
		if (Yii::app()->request->isAjaxRequest && $_POST['ajax'] == $form) {
			echo GxActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}