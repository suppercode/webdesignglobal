<?php
class Blogs extends DPortlet
{
	public function init()
	{
		if($this->refresh){
			$this->renderContent();
			exit();
		}else{
			parent::init();
		}
	}
  protected function renderContent()
  {
    echo 'Blogs Content';
  }
  
  protected function getTitle()
  {
    return 'Blogs';
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}