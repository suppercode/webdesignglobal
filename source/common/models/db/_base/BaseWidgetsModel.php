<?php

/**
 * This is the model base class for the table "{{widgets}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "WidgetsModel".
 *
 * Columns in table "{{widgets}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $title
 * @property integer $show_title
 * @property string $content
 * @property string $widget_name
 * @property integer $ordering
 * @property string $position
 * @property string $params
 * @property integer $timecache
 * @property string $created
 * @property integer $created_by
 * @property string $modified
 * @property integer $modified_by
 * @property integer $published
 *
 */
abstract class BaseWidgetsModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{widgets}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'WidgetsModel|WidgetsModels', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('title, widget_name', 'required'),
			array('show_title, ordering, timecache, created_by, modified_by, published', 'numerical', 'integerOnly'=>true),
			array('widget_name', 'length', 'max'=>255),
			array('position', 'length', 'max'=>50),
			array('content, params, created, modified', 'safe'),
			array('show_title, content, ordering, position, params, timecache, created, created_by, modified, modified_by, published', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, title, show_title, content, widget_name, ordering, position, params, timecache, created, created_by, modified, modified_by, published', 'safe', 'on'=>'search'),
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
			'title' => Yii::t('app', 'Title'),
			'show_title' => Yii::t('app', 'Show Title'),
			'content' => Yii::t('app', 'Content'),
			'widget_name' => Yii::t('app', 'Widget Name'),
			'ordering' => Yii::t('app', 'Ordering'),
			'position' => Yii::t('app', 'Position'),
			'params' => Yii::t('app', 'Params'),
			'timecache' => Yii::t('app', 'Timecache'),
			'created' => Yii::t('app', 'Created'),
			'created_by' => Yii::t('app', 'Created By'),
			'modified' => Yii::t('app', 'Modified'),
			'modified_by' => Yii::t('app', 'Modified By'),
			'published' => Yii::t('app', 'Published'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('show_title', $this->show_title);
		$criteria->compare('content', $this->content, true);
		$criteria->compare('widget_name', $this->widget_name, true);
		$criteria->compare('ordering', $this->ordering);
		$criteria->compare('position', $this->position, true);
		$criteria->compare('params', $this->params, true);
		$criteria->compare('timecache', $this->timecache);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('modified', $this->modified, true);
		$criteria->compare('modified_by', $this->modified_by);
		$criteria->compare('published', $this->published);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}