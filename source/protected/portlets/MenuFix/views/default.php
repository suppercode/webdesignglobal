<ul id="nav">
	<li><a href="<?php echo Yii::app()->controller->createUrl('/default/index');?>"><?php echo Yii::t('main','Home');?></a></li>
	<li class="border"></li>
	<li class="down_arrow"><a href="<?php echo Yii::app()->controller->createUrl('/product/index');?>"><?php echo Yii::t('main','Product');?></a>
    	<?php $allCats = FrontendShopCategoryModel::model()->getAllCategory();?>
    	<?php $allCats = FrontendShopCategoryModel::model()->getAllCategory();?>
    	<?php $rootCats = FrontendShopCategoryModel::model()->getCategory(0);?>
    	<ul>
    	<?php foreach ($rootCats as $key => $item):?>
    		<?php if($item['parent_id']==0):?>
	    		<li><span><?php echo $item['title'];?></span></li>
	    		<?php foreach ($allCats as $key2 => $item2):?>
	    		<?php if($item2->parent_id == $item['category_id']):
	    				$link = yii::app()->controller->createUrlProductCat($item2->category_id);
	    		?>
	    			<li><a href="<?php echo $link;?>"><?php echo $item2->title;?></a></li>
	    		<?php endif;?>
	    		<?php endforeach;?>
    		<?php endif;?>
    	<?php endforeach;?>
        </ul>  
    </li>
    <li class="border"></li>
    <li class="down_arrow s2"><a href="<?php echo Yii::app()->controller->createUrlArticleCategory(9);?>"><?php echo Yii::t('main','News');?></a>
            <ul>
            <?php $newsCat = FrontendCategoriesModel::model()->findAll('id<>22 AND id<>23 AND id<>24 AND id<>25 AND id<>26');?>
            <?php foreach ($newsCat as $key => $item):
            		$link = Yii::app()->controller->createUrlArticleCategory($item->id);
            ?>
                <li><a href="<?php echo $link;?>"><?php echo $item->title;?></a></li>
            <?php endforeach;?>
            </ul>
    </li>
    <li class="border"></li>
    <li><a href="<?php echo Yii::app()->controller->createUrlArticleCategory(23);?>"><?php echo Yii::t('main','Service');?></a></li>
    <li class="border"></li>
    <li><a href="<?php echo Yii::app()->controller->createUrlArticleCategory(24);?>"><?php echo Yii::t('main','Solutions');?></a></li>
    <li class="border"></li>  
    <li><a href="<?php echo Yii::app()->controller->createUrlArticleCategory(25);?>"><?php echo Yii::t('main','Technical');?></a></li>
    <li class="border"></li>  
    <li><a href="<?php echo Yii::app()->controller->createUrlArticleCategory(26);?>"><?php echo Yii::t('main','Library');?></a></li>
    <li class="border"></li>
    <li><a href="<?php echo Yii::app()->controller->createUrl('/default/contact');?>"><?php echo Yii::t('main','Contact');?></a></li>  
</ul>