<?php
/**
 * @name ShopModule
 * @version 2.0
 * @author Nguyen Van Phuong, <phuong.nguyen.itvn@gmail.com>
 * @copyright 2011 PN68 CMS
 */
class ShopModule extends CWebModule
{
	public $version = '0.7';

	// Is the Shop in debug Mode?
	public $debug = false;

  // Whether the installer should install some demo data
	public $installDemoData = true;

	// Enable this to use the shop module together with the yii user
	// management module
	public $useWithYum = false;

	// Names of the tables
	public $categoryTable = 'shop_category';
	public $productsTable = 'shop_products';
	public $orderTable = 'shop_order';
	public $orderPositionTable = 'shop_order_position';
	public $customerTable = 'shop_customer';
	public $addressTable = 'shop_address';
	public $imageTable = 'shop_image';
	public $shippingMethodTable = 'shop_shipping_method';
	public $paymentMethodTable = 'shop_payment_method';
	public $taxTable = 'shop_tax';
	public $productSpecificationTable = 'shop_product_specification';
	public $productVariationTable = 'shop_product_variation';
	public $currencySymbol = 'vnđ';

	public $logoPath = 'logo.jpg';
	public $slipView = '/order/slip';
	public $invoiceView = '/order/invoice';
	public $footerView = '/order/footer';

	public $dateFormat = 'd/m/Y';
	
	public $imageWidthThumb = 100;
	public $imageWidth = 200;

	public $notifyAdminEmail = null;

	public $termsView = '/order/terms';
	public $successAction = array('//shop/order/success');
	public $failureAction = array('//shop/order/failure');

	public $loginUrl = array('/site/login');

	// Where the uploaded product images are stored:
	public $productImagesFolder = 'productimages'; // Approot/...

	public $layout = 'application.modules.shop.views.layouts.shop';
	//public $layout = 'application.modules.admin_backend.views.layouts.sidebar_main';

	public function init()
	{
		$dir = dirname(__FILE__).'/assets';
		$assets = Yii::app()->getAssetManager()->publish($dir);
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile("{$assets}/js/jquery-ui-1.8.18.custom.min.js");
		$cs->registerCssFile("{$assets}/css/shop.css");
		$cs->registerCssFile("{$assets}/css/jquery-ui-1.8.13.custom.css");
		$this->setImport(array(
			'shop.models.*',
			'shop.components.*',
			'shop.helpers.*'
		));
		parent::init();
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
			return false;
	}
}
