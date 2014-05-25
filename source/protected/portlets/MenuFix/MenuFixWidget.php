<?php
class MenuFixWidget extends CWidget
{
	public $title = '';
	private $_url = NULL;
	public function init()
	{
		$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
		$this->_url = Yii::app()->getAssetManager()->publish($dir);
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile("{$this->_url}/css/style.css");
		$cs->registerCssFile("{$this->_url}/css/ie.css");
		$cs->registerCssFile("{$this->_url}/css/ie8.css");
		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile("{$this->_url}/js/richmenu.js");
		
		parent::init();
	}
	public function run()
	{
		$this->render('default', array(
				'url'=>$this->_url,
				'title'=>$this->title,
		));
	}
}