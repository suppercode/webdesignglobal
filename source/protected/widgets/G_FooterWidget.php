<?php
class G_FooterWidget extends CWidget{
	public $_url = null;
	public $data = null;
	public $numbercell = 3;
	public $per = '32%';
	public $style_class = 's-left';
	public function init()
	{
		$dir = dirname(__FILE__).DS.'assets'.DS.'g_footer';
		$this->_url = Yii::app()->getAssetManager()->publish($dir,false,-1,YII_DEBUG);
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile("{$this->_url}/g.css");
		parent::init();
	}
	public function run()
	{
		if(empty($this->data)){
			$this->data = array(
					array('title'=>'About Us','html'=>'comming soon ...'),
					array('title'=>'What We Do','html'=>'comming soon ...'),
					array('title'=>'Find Us','html'=>'comming soon ...'),
			);
		}
		$this->render('footer', array(
				'data'=>$this->data,
				'numbercell'=>$this->numbercell,
				'per'=>$this->per,
				'style_class'=>$this->style_class,
		));
	}
}