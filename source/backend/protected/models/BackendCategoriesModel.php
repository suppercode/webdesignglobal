<?php

Yii::import('common.models.db.CategoriesModel');

class BackendCategoriesModel extends CategoriesModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'news' => array(self::HAS_MANY, 'BackendNewsModel', 'id', 'condition'=>'tbl_content.status='.BackendNewsModel::STATUS_PUBLISHED, 'order'=>'tbl_content.created DESC'),
			'newsCount' => array(self::STAT, 'BackendNewsModel', 'catid'),
		);
	}
	public static function getNameCat($catid)
	{
		$cat = self::model()->findByPk($catid);
		if($cat)
		 return $cat->title;
		return false;
	}
	public static function updateTree()
	{
		$binarytree = new BinaryTree('id', 'title', 'parent_id', 'tbl_categories', '','','ordering' );
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
		$sql="UPDATE tbl_categories 
			  SET position = $order, title_tree = :p
			  WHERE id = :id
			";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $treename, PDO::PARAM_STR);
		$command->bindParam(':id', $id, PDO::PARAM_INT);
		return $command->query();
	}
	/**
	 * This is invoked after the record is deleted.
	 */
	protected function beforeDelete()
	{
		if(parent::beforeDelete()){
			$avaiable = $this->chkAvaiableDelete($this->id);
			if($avaiable!=''){
				echo $avaiable;
				return false;
			}else
				return true;
		}else 
			return false;
	}
	public static function chkAvaiableDelete($catID)
	{
		$newsCount = self::model()->with('newsCount')->findByPk($catID);
		if($newsCount->newsCount >0) return Yii::t('main','You must delete all article before delete this category.');
		$catChild = self::model()->findAll('parent_id=:c', array(':c'=>$catID));
		if(count($catChild)>0) return Yii::t('main','You can\'t delete because it have child category.');
		return '';
	}
}