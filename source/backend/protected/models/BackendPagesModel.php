<?php

Yii::import('common.models.db.PagesModel');

class BackendPagesModel extends PagesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function updateTree()
	{
		$binarytree = new BinaryTree('id', 'title', 'parent', 'tbl_content', '','','ordering' );
		$arr_tree = $binarytree->getTreeResult();
		if(count($arr_tree)>0){
			$order = array();
			foreach($arr_tree as $key => $value){
				$order[]=$key;
			}
			foreach($order as $key => $item){
				self::updateLevelCategory($item, $key+1, $arr_tree[$item]['treename']);
			}
		}
	}
	public static function updateLevelCategory($id, $order, $treename)
	{
		$sql="UPDATE tbl_content 
			  SET position = $order, page_tree = :p
			  WHERE id = :id
			";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $treename, PDO::PARAM_STR);
		$command->bindParam(':id', $id, PDO::PARAM_INT);
		return $command->query();
	}
	public static function getPageByAlias($alias)
	{
		$sql = "SELECT * 
				FROM tbl_content
				WHERE alias = :p AND type='page'
				";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p',$alias,PDO::PARAM_STR);
		return $command->queryRow();
	}
	public function beforeSave()
	{
		$this->modified = new CDbExpression('NOW()');
		$this->modified_by = Yii::app()->user->id;
		$this->type = 'page';
		return parent::beforeSave();
	}
}