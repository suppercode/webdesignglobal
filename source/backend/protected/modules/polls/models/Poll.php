<?php

/**
 * This is the model class for table "poll".
 *
 * The followings are the available columns in table '{{poll}}':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property PollChoice[] $choices
 * @property PollVote[] $votes
 */
class Poll extends BackendPollModel
{

  /**
   * Returns the static model of the specified AR class.
   * @return Poll the static model class
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
      'choices' => array(self::HAS_MANY, 'PollChoice', 'poll_id'),
      'votes' => array(self::HAS_MANY, 'PollVote', 'poll_id'),
      'totalVotes' => array(self::STAT, 'PollChoice', 'poll_id', 'select' => 'SUM(votes)'),
    );
  }


  /**
   * @return array customized status labels
   */
  public function statusLabels()
  {
    return array(
      '' => '',
      self::STATUS_CLOSED => 'Closed',
      self::STATUS_OPEN   => 'Open',
    );
  }

  /**
   * Returns the text label for the specified status.
   */
  public function getStatusLabel($status)
  {
    $labels = self::statusLabels();

    if (isset($labels[$status])) {
      return $labels[$status];
    }

    return $status;
  }

  /**
   * Determine if a user can vote on a Poll.
   */
  public function userCanVote()
  {
    if ($this->status == self::STATUS_CLOSED) return FALSE;

    // Setup global query attributes
    $where = array('and', 'poll_id=:poll_id', 'user_id=:user_id');
    $params = array(':poll_id' => $this->id, ':user_id' => (int) Yii::app()->user->id);

    // Add IP restricted attributes if needed
    if (Yii::app()->getModule('polls')->ipRestrict === TRUE && Yii::app()->user->isGuest) {
      $where[] = 'ip_address=:ip_address';
      $params[':ip_address'] = $_SERVER['REMOTE_ADDR'];
    }

    // Retrieve true/false if a vote exists on poll by user
    $result = (bool) Yii::app()->db->createCommand(array(
      'select' => 'id',
      'from'   => 'poll_vote',
      'where'  => $where,
      'params' => $params,
    ))->queryRow();

    return !$result;
  }

  /**
   * Determine if a user can cancel their vote.
   * @param PollVote instance
   */
  public function userCanCancelVote($pollVote)
  {
    if (!$pollVote->id || $this->status == self::STATUS_CLOSED) {
      return FALSE;
    }

    $module = Yii::app()->getModule('polls');
    $isGuest = Yii::app()->user->isGuest;
    $guestsCanCancel = $module->ipRestrict && $module->allowGuestCancel;

    if (!$isGuest || ($isGuest && $guestsCanCancel)) {
      return TRUE;
    }

    return FALSE;
  }
}
