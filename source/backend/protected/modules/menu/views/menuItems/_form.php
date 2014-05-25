<style>
ul.menutypes{
margin:0;
padding:0
}
ul.menutypes li{
	list-style-type: none;
	margin: 5px 0;
}
ul.menutypes li a{
color:#025A8D;
text-decoration: none;
}
ul.menutypes li a:hover{
	text-decoration: underline;
}
</style>
<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'menu-items-form',
	'enableAjaxValidation' => true,
));
?>
	<?php echo $form->errorSummary($model); ?>
	<br style="clear: both"/>
		<div style="float: left">
		<div class="row">
			<?php echo $form->labelEx($model,'menutypes'); ?>
			<input readonly="readonly" disabled="disabled" style="float: left" type="text" id="menuType" name="menuType" value="<?php if(isset($model->type->name) && $model->fixed_url==0) echo Yii::t('app',$model->type->name);elseif($model->fixed_url==1) echo Yii::t('app','Fixed Url');?>" />
			<input type="hidden" name="BackendMenuItemsModel[menutypes]" id="mn-type" value="<?php if(isset($model->menutypes)) echo $model->menutypes;?>" />
			<a style="float: left;margin: 3px 10px;" class="btn btn-primary btn-sm" id="sl-mt" rel="tooltip" title="Select menu type"><i class="glyphicon glyphicon-record"></i></a>
		</div>
		
		<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model, 'published'); ?>
		<?php echo $form->error($model,'published'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model, 'alias', array('maxlength' => 255)); ?>
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
		<?php echo $form->labelEx($model,'menu_group'); ?>
		<?php echo $form->dropDownList($model,'menu_group',CHtml::listData(BackendMenusModel::model()->findAll(), 'id','name')); ?>
		<?php echo $form->error($model,'menu_group'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'Parent'); ?>
		<?php
		$meid = ($model->id>0)?$model->id:0;
		$items_list = BackendMenuItemsModel::model()->findAll("menu_group =:g AND published=1 ORDER BY position ASC", array(':g'=>$model->menu_group));
		$items = CHtml::listData($items_list, 'id', 'title_tree');
		echo '<select name="BackendMenuItemsModel[parent_id]" id="BackendMenuItemsModel_parent_id">';
		echo '<option value="">--None--</option>';
		foreach($items as $key => $item):
			if($key==$meid){
				echo "<option disabled='disabled'>$item</option>";
			}else{
				if($model->parent_id==$key){
					$selected = "selected";
				}else{
					$selected="";
				}
				echo "<option value='$key' $selected>$item</option>";
			}
			
		endforeach;
		echo '</select>';
		?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model, 'ordering', array('style'=>'width: 50px')); ?>
		<?php echo $form->error($model,'ordering'); ?>
		</div><!-- row -->
		
		</div>
		<div id="itemstype" style="float: left;margin-left: 20px;">
			<?php 
			if(!$model->isNewRecord){
				$this->renderPartial('application.modules.menu.views.menutypes.'.$model->type->view, array('data'=>$model));
			}
			?>
		</div>
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->
<div id="dialog_menutypes" style="display: none">
<ul class="menutypes">
<?php 
$types = BackendMenuItemsTypesModel::model()->findAll("TRUE ORDER BY ordering ASC");
foreach ($types as $key => $value):
?>
<li>
<a href="#" onclick="selectM(<?php echo $value->id;?>,'<?php echo Yii::t('app',$value->name);?>');"><?php echo Yii::t('app',$value->name);?></a></li>
<?php endforeach;?>
</ul>
</div>
<script type="text/javascript">
    $("#sl-mt").click(function ()    {
        $('#dialog_menutypes').dialog({
            modal: true,
            dialogClass: 'dialog-chose',
            //buttons: {"Close":function(){$(this).dialog('close')}},
            height: 200,
            width: 300,
            title: '<?php echo Yii::t('app','Select Menu Type');?>'
        });
    });
    function selectM(id,name){
		$("#menuType").attr("value",name);
		$("#mn-type").attr("value",id);
		$("#MenuItems_fixed_url").attr("value",0);
		$("#fixed_url").hide();
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('menu/MenuItems/getLayoutType');?>',
			type: 'POST',
			data: "type="+id,
			success: function(data){
				$("#itemstype").html(data)
			}
			})
		$("#dialog_menutypes").dialog("close")
    }
</script>