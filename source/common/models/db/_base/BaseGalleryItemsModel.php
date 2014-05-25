<?php

/**
 * This is the model base class for the table "{{gallery_items}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "GalleryItemsModel".
 *
 * Columns in table "{{gallery_items}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $update_time
 *
 */
abstract class BaseGalleryItemsModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{gallery_items}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'GalleryItemsModel|GalleryItemsModels', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('title, catid', 'required'),
			array('catid', 'numerical', 'integerOnly'=>true),
			array('title, image', 'length', 'max'=>255),
			array('description, update_time', 'safe'),
			array('catid, description, image, update_time', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, catid, title, description, image, update_time', 'safe', 'on'=>'search'),
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
			'catid' => Yii::t('app', 'Catid'),
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'image' => Yii::t('app', 'Image'),
			'update_time' => Yii::t('app', 'Update Time'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('catid', $this->catid);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('update_time', $this->update_time, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}