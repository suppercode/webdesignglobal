<?php 
$this->btnOptions = '<a class="btn btn-sm btn-primary" onclick="jQuery(\'#menus-translate-form\').submit();">'.Yii::t('main','Save').'</a>';
$this->btnOptions .='&nbsp;<a class="btn btn-sm btn-primary" href="'.Yii::app()->createUrl('/translate/filterTranslate/Filterlayout').'">'.Yii::t('main', 'Close').'</a>';
?>
<?php
$params_filter = Yii::app()->user->getState('paramsTrans');
$languages = Yii::app()->params['languages'];
$trans_elements = @unserialize($data['trans_content']);
$trans_elements = is_array($trans_elements)?$trans_elements:false;
?>

<div class="form">
<div><?php echo Yii::app()->user->getFlash('msg');?></div>
<form method="post" action="" id="menus-translate-form">
<div class="row">
<label><?php echo Yii::t('app','Published')?></label>
<input type="checkbox" name="t_published" <?php if($data && $data['published']==1) echo 'checked';?>/>
</div>
<div class="row">
<label><?php echo Yii::t('app','Title')?></label>
<input class="textField-l" readonly="readonly" disabled="disabled" type="text" name="title" value="<?php echo $data['name'];?>" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Title').'&nbsp('.$languages[$params_filter['language']].')';?></label>
<input class="textField-l" type="text" name="BackendTranslatesModel[name]" value="<?php if($trans_elements) echo $trans_elements['name'];?>" />
</div>

<div class="row">
<label><?php echo Yii::t('app','Alias');?></label>
<input class="textField-l" disabled="disabled" type="text" name="alias" value="<?php echo $data['alias'];?>" />
</div>
<div class="row">
<label><?php echo Yii::t('app','Alias').'&nbsp('.$languages[$params_filter['language']].')'?></label>
<input class="textField-l" type="text" name="BackendTranslatesModel[alias]" value="<?php if($trans_elements) echo $trans_elements['alias'];?>" />
</div>

<input type="hidden" name="tt_id" value="<?php echo $data['tid'];?>" />
</form>
</div>
