<?php

Yii::import('common.models.db.PagesModel');

class DataPage extends PagesModel
{
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/**
	 * @return array relational rules.
	 */
	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('catid', $this->catid);
		$criteria->compare('parent', $this->parent);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('alias', $this->alias, true);
		$criteria->compare('thumb', $this->thumb, true);
		$criteria->compare('introtext', $this->introtext, true);
		$criteria->compare('fulltext', $this->fulltext, true);
		$criteria->compare('created', $this->created, true);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('modified', $this->modified, true);
		$criteria->compare('modified_by', $this->modified_by);
		$criteria->compare('ordering', $this->ordering);
		$criteria->compare('metakey', $this->metakey, true);
		$criteria->compare('metadesc', $this->metadesc, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('type', 'page');
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort'=>array(
            	'defaultOrder'=>'position ASC',
	        ),
	        'pagination'=>array(
	            'pageSize'=>10
	        ),
		));
	}
}