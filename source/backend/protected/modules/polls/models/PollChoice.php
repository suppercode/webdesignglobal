<?php

/**
 * This is the model class for table "{{poll_choice}}".
 *
 * The followings are the available columns in table '{{poll_choice}}':
 * @property string $id
 * @property string $poll_id
 * @property string $label
 * @property string $votes
 * @property integer $weight
 *
 * The followings are the available model relations:
 * @property Poll $poll
 * @property PollVote[] $pollVotes
 */
class PollChoice extends BackendPollChoiceModel
{
  /**
   * Returns the static model of the specified AR class.
   * @return PollChoice the static model class
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
      'poll' => array(self::BELONGS_TO, 'Poll', 'poll_id'),
      'pollVotes' => array(self::HAS_MANY, 'PollVote', 'choice_id'),
    );
  }


  /**
   * @return array of weights for sorting
   */
  public function getWeights()
  {
	$weights = range(-5, 5);
    return array_combine($weights, $weights);
  }

}
