<?php

class Products extends GxActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return Shop::module()->productsTable;
	}

	public function beforeValidate() {
		if(Yii::app()->language == 'de')
			$this->price = str_replace(',', '.', $this->price);
		
		return parent::beforeValidate();
	}
	public function beforeDeleteFix($product_id)
	{
		$countImages = self::model()->with('imagesCount')->findByPk($product_id);
		if(isset($countImages->imagesCount) && $countImages->imagesCount>0){
			$del = Image::model()->deleteAll('product_id='.$product_id);
		}
	}

	public function rules()
	{
		return array(
			array('title', 'required'),
			array('product_id, category_id, published, featured', 'numerical', 'integerOnly'=>true),
			array('title, price, language', 'length', 'max'=>45),
			array('sku,old_price', 'length', 'max'=>255),
			array('description, specifications, description_full, description_more', 'safe'),
			array('product_id, sku, title, description, description_full, description_more, image, image2, image3, image4, old_price, price, category_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'variations' => array(self::HAS_MANY, 'ProductVariation', 'product_id', 'order' => 'position'),
			'orders' => array(self::MANY_MANY, 'Order', 'ShopProductOrder(order_id, product_id)'),
			//'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'tax' => array(self::BELONGS_TO, 'Tax', 'tax_id'),
			'images' => array(self::HAS_MANY, 'Image', 'product_id'),
			'imagesCount'=> array(self::STAT, 'Image', 'product_id'),
			'shopping_carts' => array(self::HAS_MANY, 'ShoppingCart', 'product_id'),
		);
	}

	public function getSpecification($spec) {
		$specs = json_decode($this->specifications, true);

		if(isset($specs[$spec]))
			return $specs[$spec];

		return false;
	}

	public function getImage($image = 0, $thumb = false) {
		if(isset($this->images[$image]))
			return Yii::app()->controller->renderPartial('/image/view', array(
				'model' => $this->images[$image],
				'thumb' => $thumb), true); 
	}

	public function getSpecifications() {
		$specs = json_decode($this->specifications, true);
		return $specs === null ? array() : $specs;
	}

	public function setSpecification($spec, $value) {
		$specs = json_decode($this->specifications, true);

		$specs[$spec] = $value;

		return $this->specifications = json_encode($specs);
	}

	public function setSpecifications($specs) {
		foreach($specs as $k => $v)
			$this->setSpecification($k, $v);
	}

	public function setVariations($variations) {
		$db = Yii::app()->db;
		$db->createCommand()->delete('shop_product_variation',
				'product_id = :product_id', array(
					':product_id' => $this->product_id));

		foreach($variations as $key => $value) {
			if($value['specification_id'] 
					&& isset($value['title']) 
					&& $value['title'] != '') {

				if(isset($value['sign']) && $value['sign'] == '-')
					$value['price_adjustion'] -= 2 * $value['price_adjustion'];


				$db->createCommand()->insert('shop_product_variation', array(
							'product_id' => $this->product_id,
							'specification_id' => $value['specification_id'],
							'position' => @$value['position'] ?'': 0,
							'title' => $value['title'],
							'price_adjustion' => @$value['price_adjustion'] ?'': 0,
							));	
			}
		}
	}

		public function getVariations() {
		$variations = array();
		foreach($this->variations as $variation) {
			$variations[$variation->specification_id][] = $variation;
		}		

		return $variations;
	}


	public function attributeLabels()
	{
		return array(
			'product_id' => Yii::t('ShopModule.shop', 'Product'),
			'title' => Yii::t('ShopModule.shop', 'Product Name'),
			'description' => Yii::t('ShopModule.shop', 'Description'),
			'description_full' => Yii::t('ShopModule.shop', 'Description full'),
			'description_more' => Yii::t('ShopModule.shop', 'Description More'),
			'price' => Yii::t('ShopModule.shop', 'Price'),
			'old_price' => Yii::t('ShopModule.shop', 'Old Price'),
			'category_id' => Yii::t('ShopModule.shop', 'Categories'),
			'featured' => Yii::t('ShopModule.shop', 'Featured'),
			'published' => Yii::t('ShopModule.shop', 'Published'),
			'sku' => Yii::t('ShopModule.shop', 'SKU'),
			'manufactor_id' => Yii::t('ShopModule.shop', 'Manufactor'),
		);
	}

	public function getTaxRate($variations = null, $amount = 1) { 
		if($this->tax) {
			$taxrate = $this->tax->percent;	
			$price = (float) $this->price;
			if($variations)
				foreach($variations as $key => $variation) {
					$price += @ProductVariation::model()->findByPk($variation[0])->price_adjustion;
				}


			(float) $price *= $amount;

			(float) $tax = $price * ($taxrate / 100);

			return $tax;
		}
	}
	public function getPrice($variations = null, $amount = 1) {
		$price = (float) $this->price;
		if($variations)
			foreach($variations as $key => $variation) {
				$price += @ProductVariation::model()->findByPk($variation[0])->price_adjustion;
			}


		(float) $price *= $amount;

		return $price;
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('old_price',$this->old_price,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('published',$this->published);
		$criteria->compare('featured',$this->featured);

		return new CActiveDataProvider('Products', array(
			'criteria'=>$criteria,
			'sort'=>array(
            	'defaultOrder'=>'product_id DESC',
	        ),
	        'pagination'=>array(
	            'pageSize'=>20
	        ),
		));
	}
}
