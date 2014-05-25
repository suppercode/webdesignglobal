<?php

/**
 * This is the model base class for the table "{{content}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ContentModel".
 *
 * Columns in table "{{content}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $catid
 * @property integer $parent
 * @property string $title
 * @property string $alias
 * @property string $alias_en
 * @property string $page_tree
 * @property string $thumb
 * @property string $introtext
 * @property string $fulltext
 * @property string $type
 * @property integer $views
 * @property integer $status
 * @property string $params
 * @property string $images
 * @property string $language
 * @property string $translate_key
 * @property string $created
 * @property integer $created_by
 * @property string $modified
 * @property integer $modified_by
 * @property integer $ordering
 * @property integer $position
 * @property string $metakey
 * @property string $metadesc
 * @property integer $comment
 *
 */
abstract class BaseContentModel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{content}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ContentModel|ContentModels', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('title', 'required'),
			array('catid, parent, views, status, created_by, modified_by, ordering, position, comment', 'numerical', 'integerOnly'=>true),
			array('title, alias, alias_en, translate_key', 'length', 'max'=>255),
			array('type', 'length', 'max'=>50),
			array('language', 'length', 'max'=>10),
			array('page_tree, thumb, introtext, fulltext, params, images, created, modified, metakey, metadesc', 'safe'),
			array('catid, parent, alias, alias_en, page_tree, thumb, introtext, fulltext, type, views, status, params, images, language, translate_key, created, created_by, modified, modified_by, ordering, position, metakey, metadesc, comment', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, catid, parent, title, alias, alias_en, page_tree, thumb, introtext, fulltext, type, views, status, params, images, language, translate_key, created, created_by, modified, modified_by, ordering, position, metakey, metadesc, comment', 'safe', 'on'=>'search'),
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
			'parent' => Yii::t('app', 'Parent'),
			'title' => Yii::t('app', 'Title'),
			'alias' => Yii::t('app', 'Alias'),
			'alias_en' => Yii::t('app', 'Alias En'),
			'page_tree' => Yii::t('app', 'Page Tree'),
			'thumb' => Yii::t('app', 'Thumb'),
			'introtext' => Yii::t('app', 'Introtext'),
			'fulltext' => Yii::t('app', 'Fulltext'),
			'type' => Yii::t('app', 'Type'),
			'views' => Yii::t('app', 'Views'),
			'status' => Yii::t('app', 'Status'),
			'params' => Yii::t('app', 'Params'),
			'images' => Yii::t('app', 'Images'),
			'language' => Yii::t('app', 'Language'),
			'translate_key' => Yii::t('app', 'Translate Key'),
			'created' => Yii::t('app', 'Created'),
			'created_by' => Yii::t('app', 'Created By'),
			'modified' => Yii::t('app', 'Modified'),
			'modified_by' => Yii::t('app', 'Modified By'),
			'ordering' => Yii::t('app', 'Ordering'),
			'position' => Yii::t('app', 'Position'),
			'metakey' => Yii::t('app', 'Metakey'),
			'metadesc' => Yii::t('app', 'Metadesc'),
			'comment' => Yii::t('app', 'Comment'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('catid', $this->catid);
		$criteria->compare('parent', $this->parent);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('alias', $this->alias, true);
		$criteria->compare('alias_en', $this->alias_en, true);
		$criteria->compare('page_tree', $this->page_tree, true);
		$criteria->compare('thumb', $this->thumb, true);
		$criteria->compare('introtext', $this->introtext, true);
		$criteria->compare('fulltext', $this->fulltext, true);
		$criteria->compare('type', $this->type, true);
		$criteria->compare('views', $this->views);
		$criteria->compare('status', $this->status);
		$criteria->compare('params', $this->params, true);
		$criteria->compare('images', $this->images, true);
		$criteria->compare('language', $this->language, true);
		$criteria->compare('translate_key', $this->translate_key, true);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('modified', $this->modified, true);
		$criteria->compare('modified_by', $this->modified_by);
		$criteria->compare('ordering', $this->ordering);
		$criteria->compare('position', $this->position);
		$criteria->compare('metakey', $this->metakey, true);
		$criteria->compare('metadesc', $this->metadesc, true);
		$criteria->compare('comment', $this->comment);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}