<?php
define('SITE_URL', 'http://localhost:8989');
define('SITE_PATH', dirname(dirname(dirname(__FILE__))));
return array(
	'params'=>array(
		'site_url'		=>	SITE_URL,
		'site_path'		=>	SITE_PATH,
		'storage_path'	=>	SITE_PATH.DS.'storage',
		'storage_url'	=>	SITE_URL.'/storage',
		'gallery_path'	=>	SITE_PATH.DS.'storage'.DS.'gallery',
		'gallery_url'	=>	SITE_URL.'/storage/gallery',
		'shop_path'		=>	SITE_PATH.DS.'storage'.DS.'productimages',
		'shop_url'		=>	SITE_URL.'/storage/productimages',
		'files_path'	=> 	SITE_PATH.DS.'storage'.DS.'files',
		'files_url'		=>	SITE_URL.'/storage/files',
		'images_available'=>array(
			'full'=>array(
				'width'=>600,
				'height'=>450
			),
			'thumb'=>array(
				'width'=>180,
				'height'=>120
			),
			'type'=>array(
				'image/png'=>'png',
				'image/gif'=>'gif',
				'image/jpg'=>'jpg',
				'image/jpeg'=>'jpg'
			)
		),
		'shop'=> array(
			'images'=> array(
				's'=>array(
						'width'=>130,
						'height'=>130
				),
				'l'=>array(
						'width'=>300,
						'height'=>550
				),
				'm'=>array(
						'width'=>500,
						'height'=>550
				),
			),
			'category_thumb_width'=>835,
			'category_thumb_height'=>271,
		),
		'adminEmail'	=>	'phuong.nguyen.itvn@gmail.com',
	),
);
