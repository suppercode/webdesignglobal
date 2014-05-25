<?php

class MenuModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		$dir = Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'elrte';                       
        $url_assets = Yii::app()->getAssetManager()->publish($dir);
        $cs = Yii::app()->getClientScript();  
        $cs->registerScriptFile("{$url_assets}/js/jquery-ui-183.min.js");
        $cs->registerCssFile("{$url_assets}/css/smoothness/jquery-ui-1.8.13.custom.css");
		// import the module-level models and components
		$this->setImport(array(
			'menu.models.*',
			'menu.components.*',
			'menu.helpers.*',
		));
		parent::init();
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
