<?php 

$params = HelpTranslate::Params();
$languages = Yii::app()->params['languages'];
$languages_default = Yii::app()->params['language_default'];
$params_filter = array(
			'key'=>'ct1',
			'language'=>'en',
		);
if(Yii::app()->user->hasState('paramsTrans')){
	$params_filter = Yii::app()->user->getState('paramsTrans');
}
?>
<form name="translate-filter" action="<?php echo Yii::app()->createUrl('translate/filterTranslate/Filterlayout');?>" method="post">
<table>
<tr>
	<td><span class="label label-success"><?php echo Yii::t('app','Languages')?></span></td>
	<td><select name="Filter[language]" style="margin:0;">
	<?php foreach ($languages as $key => $value):?>
	<?php if($key!=$languages_default):?>
	<option value="<?php echo $key;?>" <?php if($params_filter['language']==$key) echo 'selected';?>><?php echo $value;?></option>
	<?php endif;?>
	<?php endforeach;?>
	</select>
	</td>
	
	<td><span class="label label-success"><?php echo Yii::t('app','Content Type')?></span></td>
	<td><select name="Filter[contentType]" style="margin:0;">
	<?php foreach ($params as $key => $value):?>
	<option value="<?php echo $key;?>" <?php if($params_filter['key']==$key) echo 'selected';?>><?php echo $value['name'];?></option>
	<?php endforeach;?>
	</select>
	</td>
	<td><button class="btn btn-primary btn-sm" type="submit"><?php echo Yii::t('app','Filter')?></button></td>
</tr>

</table>
</form>