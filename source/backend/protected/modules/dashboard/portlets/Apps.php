<?php
class Apps extends DPortlet
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
	    ?>
	    <div class="dashboard-s apps">
	    	hello world
		</div>
	    <?php
  	}
  
  protected function getTitle()
  {
    return Yii::t('main','AppStore');
  }
  
  protected function getClassName()
  {
    return __CLASS__;
  }
}