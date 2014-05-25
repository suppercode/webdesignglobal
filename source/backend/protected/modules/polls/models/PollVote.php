<?php

/**
 * This is the model class for table "{{poll_vote}}".
 *
 * The followings are the available columns in table '{{poll_vote}}':
 * @property string $id
 * @property string $choice_id
 * @property string $poll_id
 * @property string $user_id
 * @property string $ip_address
 * @property string $timestamp
 *
 * The followings are the available model relations:
 * @property User $user
 * @property PollChoice $choice
 * @property Poll $poll
 */
class PollVote extends BackendPollVoteModel
{
  /**
   * Returns the static model of the specified AR class.
   * @return PollVote the static model class
   */
  public static function model($className=__CLASS__)
  {
    return parent::model($className);
  }

  /**
   * @return array relational rules.
   */
  public function relations()
  {
    return array(
      'user' => array(self::BELONGS_TO, 'User', 'user_id'),
      'choice' => array(self::BELONGS_TO, 'PollChoice', 'choice_id'),
      'poll' => array(self::BELONGS_TO, 'Poll', 'poll_id'),
    );
  }


  /**
   * Before a PollVote is saved.
   */
  public function beforeSave()
  {
    $this->ip_address = $_SERVER['REMOTE_ADDR'];
    $this->timestamp = time();
    $this->user_id = Yii::app()->user->id;

    // Relation may not exist yet so find it normally
    $choice = PollChoice::model()->findByPk($this->choice_id);
    if ($choice) {
      $choice->votes += 1;
      $choice->save();
    }
    else {
      return FALSE;
    }

    return parent::beforeSave(); 
  }

  /**
   * After a PollVote is deleted.
   */
  public function afterDelete()
  {
    $this->choice->votes -= 1;
    $this->choice->save();

    parent::afterDelete();
  }

  
  /**
   * Before a PollVote is deleted.
   */
  public function beforeDelete()
  {
    if (!$this->poll->userCanCancelVote($this)) {
      return FALSE;
    }
    return parent::beforeDelete();
  }

}
