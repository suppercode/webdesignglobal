<?php
/**
 * @name Poll module
 * @version 1.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011
 */
class PollsModule extends CWebModule
{
	public $layout = 'application.modules.polls.views.layouts.poll';
	public $defaultController = 'poll';

	/**
	* @property boolean Force users to vote before seeing results.
	*/
	public $forceVote = TRUE;

  /**
   * @property boolean Restrict anonymous votes by IP address,
   * otherwise it's tied only to the user's ID.
   */
  public $ipRestrict = TRUE;

  /**
   * @property boolean Allow guests to cancel their votes
   * if $ipRestrict is enabled.
   */
  public $allowGuestCancel = FALSE;

	
  public function init()
  {
    $assetsFolder = Yii::app()->assetManager->publish(
      Yii::getPathOfAlias('application.modules.polls.assets')
    );
    Yii::app()->clientScript->registerCssFile($assetsFolder .'/poll.css');
    $this->setImport(array(
    		'polls.models.*',
    		'polls.components.*',
    ));
    parent::init();
  }
}
