<?php

class Category extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function scopes()
	{
		return array(
				'published'=>array(
						'condition'=>'published=1',
				),
		);
	}
	public function beforeSave()
	{
		$this->update_time = new CDbExpression('NOW()');
		return parent::beforeSave();
	}
	public function afterSave()
	{
		self::updateTree();
		return parent::afterSave();
	}
	public static function updateTree()
	{
		$binarytree = new BinaryTree('category_id', 'title', 'parent_id', 'shop_category', '','','ordering' );
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
		$sql="UPDATE shop_category 
			  SET position = $order, title_tree = :p, level=:lv
			  WHERE category_id = :id
			";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':p', $treename, PDO::PARAM_STR);
		$command->bindParam(':id', $id, PDO::PARAM_INT);
		$command->bindParam(':lv', $level, PDO::PARAM_INT);
		return $command->query();
	}
	public static function getChilds($id) {
		$data = array();

		foreach(Category::model()->findAll('parent_id = ' . $id) as $model) {
			$row['text'] = CHtml::link($model->title, array('category/view', 'id' => $model->category_id));
			$row['children'] = Category::getChilds($model->category_id);
			$data[] = $row;
		}
		return $data;
	}


	public function tableName()
	{
		return Yii::app()->getModule('shop')->categoryTable;
	}

	public function rules()
	{
		return array(
			array('title', 'required'),
			array('category_id, parent_id, position, ordering, level, published', 'numerical', 'integerOnly'=>true),
			array('title, description, language', 'length', 'max'=>45),
			array('category_id, image, parent_id, title,alias,title_tree,position,ordering,level,update_time, description, language', 'safe', 'on'=>'search'),
		);
	}

	public static function getListed() {
		$subitems = array();
		if($this->childs) foreach($this->childs as $child) {
			$subitems[] = $child->getListed();
		}
		$returnarray = array('label' => $this->title, 'url' => array('Category/view', 'id' => $this->category_id));
		if($subitems != array()) $returnarray = array_merge($returnarray, array('items' => $subitems));
		return $returnarray;
	}

	public function relations()
	{
		return array(
			'ProductsCount'=>array(self::STAT, 'Products', 'category_id'),
			'Products' => array(self::HAS_MANY, 'Products', 'category_id'),
			'parent' => array(self::BELONGS_TO, 'Category', 'parent_id'),
			'childs' => array(self::HAS_MANY, 'Category', 'parent_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'category_id' => '#',
			'parent_id' => Yii::t('shop', 'Parent Category'),
			'title' => Yii::t('shop', 'Category'),
			'ordering' => Yii::t('shop', 'Ordering'),
			'description' => Yii::t('shop', 'Description'),
		);
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('category_id',$this->category_id);

		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('level',$this->level);

		$criteria->compare('title',$this->title,true);
		$criteria->order = "position ASC";

		return new CActiveDataProvider('Category', array(
			'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>Yii::app()->params['perpage']
				),
		));
	} 
	public function getListCategory($productId)
	{
		$sql = "SELECT c1.* 
				FROM shop_category c1
				INNER JOIN shop_product_category c2 ON c1.category_id = c2.category_id
				WHERE c2.product_id = :pid
				";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':pid', $productId, PDO::PARAM_INT);
		$cats = $command->queryAll();
		$list = array();
		if(count($cats)>0){
			foreach ($cats as $key => $value){
				$list[$value['category_id']] = $value['title'];
			}
		}
		return implode(',', $list);
	}
}
