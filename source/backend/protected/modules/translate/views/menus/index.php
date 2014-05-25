<?php
$this->renderPartial('..//filterTranslate/_form');
?>
<?php 
$this->btnOptions = '<button class="btn btn-danger" onclick="CoreJs.deleteAll(\''.Yii::app()->createUrl('/translate/filterTranslate/delMulti').'\',\''.Yii::t('app','Are you sure you want to delete item?').'\')">'.Yii::t('main','Delete Translate').'</button>';
?>
<?php

$total = BackendTranslatesModel::getTotalData($paramsTrans['language'],'tbl_menu_items','id');
$page = new CPagination($total);

$page->pageSize = 20;
$curr_page = $page->getCurrentPage();
$data = BackendTranslatesModel::GetListTransMenus($paramsTrans['language'],$page->getLimit(), $page->getOffset());
?>
<div class="grid-view X-igrid">
<div class="wrr-x-grid">
<table class="items itable">
<thead>
<tr>
<th width="60"><div id="sl-row" onclick="CoreJs.checkAll(this.id);"><input type="checkbox" class="checkall" value="" /></div></th>
<th><?php echo Yii::t('app','ID')?></th>
<th><?php echo Yii::t('app','Content')?></th>
<th><?php echo Yii::t('app','Content').'&nbsp;('.$languages[$paramsTrans['language']].')'?></th>
<th width="100"><?php echo Yii::t('app','Translated')?></th>
<th><?php echo Yii::t('app','Published')?></th>
<th><?php echo Yii::t('app','Translate ID')?></th>
</tr>
</thead>
<tbody>
<?php
foreach ($data as $key => $value):
?>
<tr>
<td><input value="<?php echo $value['tid']; ?>" type="checkbox" name="rad_ID[]" id="rad_ID"></td>
<td><?php echo $value['id']?></td>
<td><?php echo $value['name']?>
</td>
<td>
<?php 
$Ctrans = @unserialize($value['trans_content']);
if(is_array($Ctrans) && $Ctrans["name"]!='')
	echo $Ctrans["name"];
?>
</td>
<td width="100"><?php if($value['published']!=''):?>
<a href="<?php echo Yii::app()->createUrl('translate/filterTranslate/UpdateTrans', array('id'=>$value['id']));?>" class="btn btn-success btn-sm" style="color: #fff"><i class="glyphicon glyphicon-ok"></i>&nbsp;<?php echo Yii::t('app','Edit');?></a>
<?php else:?>
<a href="<?php echo Yii::app()->createUrl('translate/filterTranslate/create', array('id'=>$value['id']))?>" class="btn btn-warning btn-sm" style="color: #fff">Translate</a>
<?php endif;?>
</td>
<td width="50">
<?php if($value['published']==1):?>
<span class="label label-success"><?php echo Yii::t("main","Translated")?></span>
<?php elseif($value['published']==0):?>
<span class="label label-danger"><?php echo Yii::t("main","Not Translated")?></span>
<?php endif;?>
</td>
<td width="100"><?php echo $value['tid']?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
</div>
<div class="pagination">
<?php
	$this->widget('CLinkPager',
	array(
		'pages' => $page,
		'maxButtonCount'=>4
		));
	$this->widget('CListPager', array(
	    'pages'=>$page,
	));
		
?>

</div>