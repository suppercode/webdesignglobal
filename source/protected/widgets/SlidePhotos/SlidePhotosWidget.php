<?php
class SlidePhotosWidget extends CWidget
{
	public $_url = NULL;
	public function init()
	{
		$dir = dirname(__FILE__).DS.'assets';
		$this->_url = Yii::app()->getAssetManager()->publish($dir,false,-1,YII_DEBUG);
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile("{$this->_url}/css/settings.css");
		$cs->registerScriptFile("{$this->_url}/js/jquery.themepunch.plugins.min.js");
		$cs->registerScriptFile("{$this->_url}/js/jquery.themepunch.revolution.min.js");
		parent::init();
	}
	public function run()
	{
		$this->render('default');
	}
}