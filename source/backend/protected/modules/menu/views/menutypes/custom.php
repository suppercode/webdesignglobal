<?php 
$u = (isset($data->params) && $data->params!='')?unserialize($data->params):NULL;
if(!empty($u) && count($u['p'])>0){
	foreach ($u['p'] as $key => $value){
		$p_array[] = "$key=$value";
	}
	$param = implode('&',$p_array);
}
?>
<div class="row">
	<label><?php echo Yii::t('app', 'Router');?></label>
	<input type="text" name="BackendMenuItemsModel[params][r]" value="<?php if(count($u)>0) echo $u['r'];?>" />
	<p style="text-align: right">(exp: /module/controller/action)</p>
</div>
<div class="row">
	<label><?php echo Yii::t('app', 'Param');?></label>
	<input type="text" name="BackendMenuItemsModel[params][p]" value="<?php if(isset($param) && !empty($param)) echo $param;?>" />
	<p style="text-align: right">(exp: a=1&b=2&c=3)</p>
</div>
