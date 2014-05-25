<?php 
/**
 * @name NVP Content Manager System
 * @version 1.8 
 * @author  phuong.nguyen.itvn@gmail.com
 * @link http://webvietpro.vn
 * @copyright 2011-2012 Webvietpro Solutions Ltd.
 */
?>
<script type="text/javascript">
$(function() {
	$( "#tabs-news" ).tabs();
	
});
</script>
<div class="form">
<?php 
$form = $this->beginWidget('GxActiveForm', array(
	'id' => 'news-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data', 'name'=>'news-form'),
));
?>

<div id="tabs-news">
	<ul>
		<li><a href="#main-news"><?php echo Yii::t('main','Content')?></a></li>
		<li><a href="#images"><?php echo Yii::t('main','Images')?></a></li>
		<li><a href="#add-files"><?php echo Yii::t('main','Add Files')?></a></li>
	</ul>
	<div id="main-news">
		<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',BackendLookupModel::items('PostStatus')); ?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255, 'class'=>'textField-l', 'onBlur'=>'CoreJs.buildAlias(this.value, \'-\',\'BackendNewsModel_alias\');')); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model, 'alias', array('class'=>'textField-l')); ?>
		<?php echo $form->error($model,'alias'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php 
			$langs = Yii::app()->params['languages'];
			echo $form->dropDownList($model,'language', $langs);
		?>
		<?php echo $form->error($model,'language'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'catid'); ?>
		<?php
			$call_cats =BackendCategoriesModel::model()->findAll('published=:p ORDER BY position ASC', array(':p'=>1));
			$cats = CHtml::listData($call_cats, 'id', 'title_tree');
			echo $form->dropDownList($model,'catid', $cats);
			
		?>
		<?php echo $form->error($model,'catid'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'introtext'); ?>
		<?php
		$this->widget('ext.elrte.elRTE', array(
		    'selector'=>'BackendNewsModel_introtext',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '150',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'normal',
		 ));
		  echo $form->textArea($model, 'introtext');
		?>
		<?php echo $form->error($model,'introtext'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fulltext'); ?>
		<?php
		$this->widget('ext.elrte.elRTE', array(
		    'selector'=>'BackendNewsModel_fulltext',
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
		  echo $form->textArea($model, 'fulltext'); 
		?>
		<?php echo $form->error($model,'fulltext'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model, 'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'metakey'); ?>
		<?php echo $form->textArea($model, 'metakey', array('class'=>'textarea-m')); ?>
		<?php echo $form->error($model,'metakey'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'metadesc'); ?>
		<?php echo $form->textArea($model, 'metadesc', array('class'=>'textarea-m')); ?>
		<?php echo $form->error($model,'metadesc'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->checkBox($model, 'comment'); ?>
		<?php echo $form->error($model,'comment'); ?>
		</div>
	</div>
	<div id="images">
	<?php if(!empty($model->id)):?>
		<?php 
		$images = ($model->images!='')?unserialize($model->images):null;
		$Images_Types = BackendContentImagesModel::model()->findAll();
		if(count($Images_Types)>0){
			foreach ($Images_Types as $value){
				$image = ($images!=null && isset($images["{$value['name']}"]))?Yii::app()->params['storage_url'].$images["{$value['name']}"]["url"]:'';
				$size = Array();
				if($image!=''){
					$size = @getimagesize($image);
				}
				?>
				
				<div class="el-dialogform" style="clear:both">
				<fieldset>
					<legend><label><?php echo $value['name']?> (<?php echo $value['width'].'x'.$value['height']?>)</label></legend>
					
					<div id="uploaded_<?php echo $value['name']?>">
						<?php if($size):?>
						<div><?php echo $size[0].'x'.$size[1];?></div>
						<?php endif;?>
						<?php if(isset($images["{$value['name']}"])):?>
						<img id="<?php echo $value['name'];?>_image" width="<?php echo $value['width']?>" height="<?php echo $value['height']?>" src="<?php echo $image;?>" />
						<?php else:?>
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/default.gif" />
						<?php endif;?>
					</div>
					<br class="clear" />
					<div class="wb-upload">
					<?php $this->widget('MUploadify',array(
						'name'=>'myPicture['.$value['name'].']',
						'buttonText'=>Yii::t('app','Upload Image'),
						'script'=>array('/news/news/upload'),
						'model_id'=>$model->id,
						'fileExt'=>'*.jpg;*.png;',
						'auto'=>true,
						'size_x'=>$value['width'],
						'size_y'=>$value['height'],
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
							 	$("#uploaded_'.$value['name'].'").html("<img src=\""+respone+"\" />");
							 	$("#wb-del-'.$value['name'].'").html("<a class=\"wb-del\" href=\"javascript:void(0);\" onclick=\"DelImage(\''.$value['name'].'\','.$model->id.');\" >'.Yii::t('app','Delete').'</a>");
							}
						}',
					));
					?>
					</div>
					<div class="toolb-i">
						<div id="wb-del-<?php echo $value['name'];?>">
							<?php if(!empty($images["{$value['name']}"])):?>
							<a class="wb-del" href="javascript:void(0);" onclick="DelImage('<?php echo $value['name'];?>',<?php echo $model->id;?>);">
							<?php echo Yii::t('app','Delete');?>
							</a>
							<?php endif;?>
						</div>
					</div>
					
				</fieldset>
				</div>
				<?php
			}
		}
	?>
	<?php else:?>
	<i><?php echo Yii::t('app','You must save this article before upload image.')?></i>
	<?php endif;?>
	</div>
	<div id="add-files">
		<a style="color: #fff;float: right;" id="files-list" class="btn btn-success small"><i class="icon-plus-sign icon-white"></i>Thêm file</a>
		<div style="clear: both" id="file-added">
			<?php 
			$fileAttached = BackendContentFilesModel::model()->getFileByContent($model->id);
			if($fileAttached){
					foreach ($fileAttached as $key => $file){
						echo '<div class="row-file" id="f_'.$file['id'].'">'.$file['source_path'].'&nbsp;<a style="color: #fff;" onclick="removeFile(\''.$file['id'].'\')" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Xóa</a></div>';	
					}
				} 
			?>
		</div>
	</div>
</div>
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->

<script type="text/javascript">
function DelImage(type,id){
	if(confirm('<?php echo Yii::t('main','Are you sure to want to delete this image?');?>')){
		jQuery.ajax({
			url: '<?php echo Yii::app()->createUrl('/news/news/delimage');?>',
			data: {type:type, id:id},
			dataType:'json',
			success: function(data){
		   		if(data.error==false){
					jQuery("#wb-del-"+type).html("");   	
					jQuery("#uploaded_"+type).html("<img src=\"/backend/themes/default/images/default.gif\">");   	
			  	}
			}
		})
	}
}
</script>
<div id="files-list-data"></div>
<script type="text/javascript">
    $("#files-list").click(function ()    {
        $('#files-list-data').html('<iframe frameborder="0" width="800" height="450" src="<?php echo Yii::app()->createUrl('/files/files/listAjax')?>"></iframe>')
        .dialog({
            modal: true,
            dialogClass: 'dialog-chose',
            //buttons: {"Chose":function(){alert('chosed')}},
            height: 550,
            width: 830,
            title: 'Danh sách file upload'
        });
    });
</script>
<?php if($model->id):?>
<script>
function selectFile(id, fileName) {
	$.ajax({
	  url: "<?php echo Yii::app()->createUrl('/files/files/getFile')?>",
	  data: {file_id: id, content_id:<?php echo $model->id;?>},
	  success: function(data){
		  var html = '<div class="row-file" id="f_'+id+'">'+fileName+'&nbsp;<a style="color: #fff;" onclick="removeFile(\''+id+'\')" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Xóa</a></div>';
		  $("#file-added").append(html);
	  }
	});
	$("#files-list-data").dialog("close");
}
function removeFile(file_id)
{
	$.ajax({
		  url: "<?php echo Yii::app()->createUrl('/files/files/removeFile')?>",
		  data: {file_id: file_id, content_id:<?php echo $model->id;?>},
		  success: function(data){
			  $("#f_"+file_id).remove();
		  }
		});
	return false;
}
</script>
<?php endif;?>