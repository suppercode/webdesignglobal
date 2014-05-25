<?php 
function renderVariation($variation, $i) { 
	if(!ProductSpecification::model()->findByPk(1))
		return false;
	if(!$variation) {
		$variation = new ProductVariation;
		$variation->specification_id = 1;
	}

	$str = '<tr> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][specification_id]",
			$variation->specification_id, CHtml::listData(
				ProductSpecification::model()->findall(), "id", "title"), array(
				'empty' => '-'));  

	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][title]", $variation->title, array('style'=>'width:100px')); 
	$str .= '</td> <td>';
	$str .= CHtml::dropDownList("Variations[{$i}][sign]",
			$variation->price_adjustion >= 0 ? '+' : '-', array(
				'+' => '+',
				'-' => '-'), array('style'=>'width:50px'));
	$str .= '</td> <td>';
	$str .= CHtml::textField("Variations[{$i}][price_adjustion]", abs($variation->price_adjustion), array('style'=>'width: 100px;'));  
	$str .= '</td> <td>';
	for($j = -10; $j <= 10; $j++)
		$positions[$j] = $j;
	$str .= CHtml::dropDownList("Variations[{$i}][position]",
			$variation->position,
			$positions,array('style'=>'width:50px'));
	$str .= '</td> </tr>';

return $str;
} ?>
<script type="text/javascript">
jQuery(function() {
	jQuery("#tabs").tabs();
	
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'products-form',
			)); ?>

<?php echo $form->errorSummary($model); ?>
<div id="tabs">
	<ul>
		<li><a href="#tab1"><?php echo Yii::t('shop','Product')?></a></li>
		<!-- <li><a href="#tab2"><?php echo Yii::t('shop','Specifications')?></a></li>-->
		<li><a href="#tab3"><?php echo Yii::t('shop','Picture')?></a></li>
	</ul>
<div id="tab1">
<div class="row">
	<?php echo $form->labelEx($model,'published'); ?>
	<?php echo $form->checkBox($model, 'published'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'featured'); ?>
	<?php echo $form->checkBox($model, 'featured'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'category_id'); ?>
<?php 
$listData = CHtml::listData(Category::model()->findAll('TRUE ORDER BY position ASC'), 'category_id', 'title_tree');
if(Yii::app()->params['shop']['multicat']){
	if(!$model->isNewRecord){
		$selected = BackendShopProductCategoryModel::model()->getCategory($model->product_id);
	}else{
		$selected = array();
	}
	echo CHTML::dropDownList('category_id[]', $selected, $listData, array('multiple'=>'multiple', 'style'=>'height: 200px; width: 250px;'));
}else
	echo $form->dropDownList($model, 'category_id', $listData);
?>
<?php echo $form->error($model,'category_id'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'title'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'sku'); ?>
<?php echo $form->textField($model,'sku',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'sku'); ?>
</div>
<!-- 
<div class="row">
<?php echo $form->labelEx($model,'old_price'); ?>
<?php echo $form->textField($model,'old_price',array('size'=>255,'maxlength'=>255)); ?>
<?php echo $form->error($model,'old_price'); ?>
</div>
-->
<div class="row">
<?php echo $form->labelEx($model,'price'); ?>
<?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'price'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'manufactor_id'); ?>
<?php 
$listData = CHtml::listData(ShopManufactorModel::model()->findAll(), 'id', 'name');
echo $form->dropDownList($model, 'manufactor_id', $listData);
?>
<?php echo $form->error($model,'manufactor_id'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'description'); ?>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'Products_description',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '300',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'myToolbar',
		 ));
		  echo $form->textArea($model, 'description'); 
		?>
<?php echo $form->error($model,'description'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'description_full'); ?>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'Products_description_full',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
		  echo $form->textArea($model, 'description_full'); 
		?>
<?php echo $form->error($model,'description_full'); ?>
</div>
<div class="row">
<?php echo $form->labelEx($model,'description_more'); ?>
<?php
		$this->widget('application.extensions.elrte.elRTE', array(
		    'selector'=>'Products_description_more',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
		  echo $form->textArea($model, 'description_more'); 
		?>
<?php echo $form->error($model,'description_more'); ?>
</div>
</div>
<!--
<div id="tab2">

<?php foreach(ProductSpecification::model()->findAll() as $specification) { ?>
	<div class="row">
		<?php echo CHtml::label($specification->title, ''); ?>
		<?php echo CHtml::textField("Specifications[{$specification->title}]",
				$model->getSpecification($specification->title),array(
					'size'=>45,'maxlength'=>45)); ?>
		</div>
		<?php } ?>
<?php if(!$model->isNewRecord) { ?>
<table>
		<?php 
		printf('<tr><th>%s</th><th>%s</th><th colspan = 2>%s</th><th>%s</th></tr>',
				Shop::t('Specification'), 
				Shop::t('Value'), 
				Shop::t('Price adjustion'),
				Shop::t('Position'));


		$i = 0;
		foreach($model->variations as $variation) { 
			echo renderVariation($variation, $i); 
			$i++;
		}

			echo renderVariation(null, $i); 
 ?>
	</table>	
	<?php 
	
	echo CHtml::button(Shop::t('Save specifications'), array(
				'submit' => array(
					'//shop/products/update',
					'return' => 'product',
					'id' => $model->product_id), 'class'=>'btn')); ?>



<?php } ?>
</div>
-->
<div id="tab3">
<?php if($model->isNewRecord):?>
<i><?php echo Yii::t('shop','You must save this product before upload image.')?></i>
<?php else:?>
<div class="image_row">
<div id="uploaded_image">
	<?php if($model->image!=''):?>
	<img id="image" width="130" src="<?php echo Yii::app()->params['shop_url'].DS.'s'.DS.$model->image;?>" />
	<?php else:?>
	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/default.gif" />
	<?php endif;?>
</div>
<br />
<div class="wb-upload">
<?php $this->widget('MUploadify',array(
						'name'=>'ProductImage[image]',
						'buttonText'=>Yii::t('app','Upload Image'),
						'script'=>array('/shop/products/upload'),
						'model_id'=>$model->product_id,
						'fileExt'=>'*.jpg;*.png;',
						'auto'=>true,
						'size_x'=>'130',
						'size_y'=>'130',
					  //fileDesc=>Yii::t('application','Image files'),
					  //'uploadButton'=>true,
					  //'uploadButtonText'=>'Upload new',
					  //'uploadButtonTagname'=>'button',
					  //'uploadButtonOptions'=>array('class'=>'myButton'),
						'onComplete'=>'js:function(event, id, obj,respone, data){
							if(respone=="error_file_type"){
								alert("Upload lỗi.Kiểu file không hợp lệ.")
							}else if(respone=="error_file_upload"){
								alert("Lỗi upload.Không thể upload file.Hãy kiểm tra lại quyền thư mục upload file.")
							}else{
							 	$("#uploaded_image").html("<img src=\""+respone+"\" />");
							 	$("#wb-del-image").html("<a class=\"wb-del\" href=\"javascript:void(0);\" onclick=\"DelImage(\''.$model->product_id.'\',\'image\');\" >'.Yii::t('app','Delete').'</a>");
							}
						}',
					));
?>
</div>
<div class="toolb-i">
	<div id="wb-del-image">
		<?php if(!empty($model->image)):?>
		<a class="wb-del" href="javascript:void(0);" onclick="DelImage(<?php echo $model->product_id;?>, 'image');">
		<?php echo Yii::t('app','Delete');?>
		</a>
		<?php endif;?>
	</div>
</div>
</div>
<?php 
for($i=2; $i<5; $i++){
$field = 'image'.$i;
	?>
<div class="image_row">
<div id="uploaded_image<?php echo $i;?>">
	<?php if($model->$field!=''):?>
	<img id="image<?php echo $i;?>" width="130" src="<?php echo Yii::app()->params['shop_url'].DS.'s'.DS.$model->$field;?>" />
	<?php else:?>
	<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/default.gif" />
	<?php endif;?>
</div>
<br />
<div class="wb-upload">
<?php $this->widget('MUploadify',array(
						'name'=>'ProductImage[image'.$i.']',
						'buttonText'=>Yii::t('app','Upload Image'),
						'script'=>array('/shop/products/upload'),
						'model_id'=>$model->product_id,
						'fileExt'=>'*.jpg;*.png;',
						'auto'=>true,
						'size_x'=>'130',
						'size_y'=>'130',
					  //fileDesc=>Yii::t('application','Image files'),
					  //'uploadButton'=>true,
					  //'uploadButtonText'=>'Upload new',
					  //'uploadButtonTagname'=>'button',
					  //'uploadButtonOptions'=>array('class'=>'myButton'),
						'onComplete'=>'js:function(event, id, obj,respone, data){
							if(respone=="error_file_type"){
								alert("Upload lỗi.Kiểu file không hợp lệ.")
							}else if(respone=="error_file_upload"){
								alert("Lỗi upload.Không thể upload file.Hãy kiểm tra lại quyền thư mục upload file.")
							}else{
							 	$("#uploaded_image'.$i.'}").html("<img src=\""+respone+"\" />");
							 	$("#wb-del-image'.$i.'").html("<a class=\"wb-del\" href=\"javascript:void(0);\" onclick=\"DelImage(\''.$model->product_id.'\',\''.$field.'\');\" >'.Yii::t('app','Delete').'</a>");
							}
						}',
					));
?>
</div>
<div class="toolb-i">
	<div id="wb-del-image<?php echo $i;?>">
		<?php if(!empty($model->$field)):?>
		<a class="wb-del" href="javascript:void(0);" onclick="DelImage(<?php echo $model->product_id;?>, '<?php echo $field;?>');">
		<?php echo Yii::t('app','Delete');?>
		</a>
		<?php endif;?>
	</div>
</div>
</div>
<?php	
}
?>
<?php endif;?>
</div>
</div>
	<input type="hidden" name="apply" id="apply" value="0" />
<?php $this->endWidget(); ?>
</div><!-- form -->
<script>
function DelImage(productId,field){
	if(confirm('<?php echo Yii::t('app','Are you sure to want to delete this image?');?>')){
		jQuery.ajax({
			url: '<?php echo Yii::app()->createUrl('/shop/products/delimage');?>',
			data: {productId:productId, field:field},
			dataType:'json',
			success: function(data){
		   		if(data.error==false){
					jQuery("#wb-del-"+field).html("");
					jQuery("#uploaded_"+field).html("<img src=\"<?php echo Yii::app()->theme->baseUrl;?>/images/default.gif\" />");   	
			  	}
			}
		})
	}
}
</script>