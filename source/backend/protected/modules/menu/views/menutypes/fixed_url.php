<?php 
$new = 'checked="checked"';
$current='';
if(isset($data->url_open) && $data->url_open=='current'){
	$current = 'checked="checked"';
	$new = '';
}
?>
<div id="fixed_url">
<label>Url<span class="required">*</span></label>
		<input type="text" name="BackendMenuItemsModel[url]" value="<?php if(isset($data->url)) echo $data->url;?>" />
</div><!-- row -->
<div>
		<input type="radio" name="BackendMenuItemsModel[url_open]" value="new" <?php echo $new;?> />
		<span><?php echo Yii::t('app','New window');?></span>
		<input type="radio" name="BackendMenuItemsModel[url_open]" value="current" <?php echo $current;?>  />
		<span><?php echo Yii::t('app','Current window');?></span>
		<input type="hidden" name="BackendMenuItemsModel[fixed_url]" id="BackendMenuItemsModel_fixed_url" value="<?php if(isset($data->fixed_url) && $data->fixed_url==1) echo $data->fixed_url;?>" />
</div>