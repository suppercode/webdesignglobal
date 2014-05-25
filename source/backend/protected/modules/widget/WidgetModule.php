<?php
/**
 * @name Widgets module
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class WidgetModule extends CWebModule
{
	public function init()
	{
		$widgets = Yii::app()->params['widgets'];
		foreach ($widgets as $key => $value){
			$import[] = $value['path'];
		}
		$this->setImport($import);
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
