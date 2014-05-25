<?php

class InfosysModule extends CWebModule
{
	public $defaultController = 'Main';
	public function init()
	{
		// this method is called when the module is being created
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
