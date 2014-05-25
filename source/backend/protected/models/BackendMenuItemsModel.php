<?php

Yii::import('common.models.db.MenuItemsModel');

class BackendMenuItemsModel extends MenuItemsModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function beforeSave()
	{
		$this->update_time = new CDbExpression('NOW()');
		return parent::beforeSave();
	}
	public static function updateTree()
	{
		$binarytree = new BinaryTree('id', 'name', 'parent_id', 'tbl_menu_items', '','','ordering' );
		$arr_tree = $binarytree->getTreeResult();
		if(count($arr_tree)>0){
			$order = array();
			foreach($arr_tree as $key => $value){
				$order[]=$key;
			}
			foreach($order as $key => $item){
				self::updateLevelCategory($item, $key+1, $arr_tree[$item]['treename'], $arr_tree[$item]['level']);
			}
		}
	}
	public static function updateLevelCategory($id, $order, $treename,$level='')
	{
		$sql="UPDATE tbl_menu_items
		SET position = :o, title_tree = :p, level=:lv
		WHERE id = :id
		";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $treename, PDO::PARAM_STR);
		$command->bindParam(':o', $order, PDO::PARAM_INT);
		$command->bindParam(':id', $id, PDO::PARAM_INT);
		$command->bindParam(':lv', $level, PDO::PARAM_INT);
		return $command->query();
	}
	public function search() {
		$criteria = new CDbCriteria;
	
		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('alias', $this->alias, true);
		$criteria->compare('title_tree', $this->title_tree, true);
		$criteria->compare('parent_id', $this->parent_id);
		$criteria->compare('menu_group', $this->menu_group);
		$criteria->compare('content_id', $this->content_id);
		$criteria->compare('params', $this->params, true);
		$criteria->compare('menutypes', $this->menutypes);
		$criteria->compare('url', $this->url, true);
		$criteria->compare('position', $this->position);
		$criteria->compare('ordering', $this->ordering);
		$criteria->compare('level', $this->level);
		$criteria->compare('fixed_url', $this->fixed_url);
		$criteria->compare('url_open', $this->url_open, true);
		$criteria->compare('translate_key', $this->translate_key, true);
		$criteria->compare('published', $this->published);
		$criteria->compare('update_time', $this->update_time, true);
		$criteria->compare('language', $this->language, true);
	
		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
				'sort'=>array(
						'defaultOrder'=>'position ASC',
				),
		));
	}
}