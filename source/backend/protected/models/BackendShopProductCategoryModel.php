<?php

Yii::import('common.models.db.ShopProductCategoryModel');

class BackendShopProductCategoryModel extends ShopProductCategoryModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function updateProductAndCategory($productId, $category)
	{
		if(count($category)<=0) return false;
		$this->removeExistsProduct($productId);
		$sql = "INSERT INTO shop_product_category(product_id, category_id) VALUES";
		$val = array();
		foreach ($category as $key => $value){
			$val[] = "($productId, $value)";
		}
		$sql .= implode(',', $val);
		$command = Yii::app()->db->createCommand($sql);
		return $command->query();
	}
	public function getCategory($productId)
	{
		$sql = "SELECT category_id FROM shop_product_category WHERE product_id=:pid";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':pid', $productId, PDO::PARAM_INT);
		$result = $command->queryAll();
		$category = array();
		if(count($result)>0){
			foreach ($result as $key => $value){
				$category[]=$value['category_id'];
			}
		}
		return $category;
	}
	private function isExists($productId)
	{
		$sql = "SELECT count(*) as cnt FROM shop_product_category WHERE product_id=:pid";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':pid', $productId, PDO::PARAM_INT);
		$result = $command->queryRow();
		if($result['cnt']>0) return true;
		return false;
	}
	private function removeExistsProduct($productId)
	{
		if($this->isExists($productId)){
			$sql = "DELETE FROM shop_product_category WHERE product_id=:pid";
			$command = Yii::app()->db->createCommand($sql);
			$command->bindParam(':pid', $productId, PDO::PARAM_INT);
			return $command->query();
		}
		return false;
	}
}