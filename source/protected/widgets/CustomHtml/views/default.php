<div class="<?php echo $csClass;?>">
<?php 
if(!empty($params)):
	$data = @unserialize($params->params);
?>
<?php if($params->show_title>0):?>
<h1 class="title"><?php echo $params->title;?></h1>
<?php endif;?>
<div class="bht">
<?php echo $data['content'];?>
</div>
<?php endif;?>
</div>
