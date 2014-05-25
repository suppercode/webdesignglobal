<?php
class SlideImagesWidget extends CWidget
{
	public $_url = NULL;
	public function init()
	{
		$dir = dirname(__FILE__).DS.'assets';
		$this->_url = Yii::app()->getAssetManager()->publish($dir,false,-1,YII_DEBUG);
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile("{$this->_url}/css/royalslider.css");
		$cs->registerCssFile("{$this->_url}/css/rs-minimal-white.css");
		$cs->registerCssFile("{$this->_url}/css/style.css");
		$cs->registerScriptFile("{$this->_url}/js/jquery.royalslider.min.js");
		parent::init();
	}
	
	public function run()
	{
		$this->render('default');
	}
}