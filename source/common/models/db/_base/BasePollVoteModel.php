<?php

/**
 * This is the model base class for the table "poll_vote".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PollVoteModel".
 *
 * Columns in table "poll_vote" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $choice_id
 * @property string $poll_id
 * @property string $user_id
 * @property string $ip_address
 * @property string $timestamp
 *
 */
abstract class BasePollVoteModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'poll_vote';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PollVoteModel|PollVoteModels', $n);
	}

	public static function representingColumn() {
		return 'ip_address';
	}

	public function rules() {
		return array(
			array('choice_id, poll_id', 'required'),
			array('choice_id, poll_id, user_id, timestamp', 'length', 'max'=>11),
			array('ip_address', 'length', 'max'=>16),
			array('user_id, ip_address, timestamp', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, choice_id, poll_id, user_id, ip_address, timestamp', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'choice_id' => Yii::t('app', 'Choice'),
			'poll_id' => Yii::t('app', 'Poll'),
			'user_id' => Yii::t('app', 'User'),
			'ip_address' => Yii::t('app', 'Ip Address'),
			'timestamp' => Yii::t('app', 'Timestamp'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('choice_id', $this->choice_id, true);
		$criteria->compare('poll_id', $this->poll_id, true);
		$criteria->compare('user_id', $this->user_id, true);
		$criteria->compare('ip_address', $this->ip_address, true);
		$criteria->compare('timestamp', $this->timestamp, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}