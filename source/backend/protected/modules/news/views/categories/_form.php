<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'categories-form',
	'enableAjaxValidation' => false,
));
?>

	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model, 'published'); ?>
		<?php echo $form->error($model,'published'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255, 'style'=>'width:400px;','onBlur'=>'CoreJs.buildAlias(this.value, \'-\',\'BackendCategoriesModel_alias\');')); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model, 'alias', array('maxlength' => 255, 'style'=>'width:400px;')); ?>
		<?php echo $form->error($model,'alias'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php 
			$meid = ($model->id!=0)?$model->id:0;
			$cats = BackendCategoriesModel::model()->findAll('published=:p ORDER BY position ASC', array(':p'=>1));
			$listdata = CHtml::listData($cats, 'id', 'title_tree');
			echo '<select name="BackendCategoriesModel[parent_id]" id="BackendCategoriesModel_parent_id">';
			echo '<option value="">--None--</option>';
			foreach($listdata as $key => $cat):
				if($key==$meid){
					echo "<option disabled='disabled'>$cat</option>";
				}else{
					if($model->parent_id==$key){
						$selected = "selected";
					}else{
						$selected="";
					}
					echo "<option value='$key' $selected>$cat</option>";
				}
				
			endforeach;
			echo '</select>';
		?>
		<?php echo $form->error($model,'parent_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php 
			$langs = Yii::app()->params['languages'];
			echo $form->dropDownList($model,'language', $langs);
		?>
		<?php echo $form->error($model,'language'); ?>
		</div><!-- row -->
		<?php if(Yii::app()->params['multilang']):?>
		<div class="row">
		<?php echo $form->labelEx($model,'translate_key'); ?>
		<?php 
			echo $form->textField($model,'translate_key', array('type'=>'hidden'));
		?>
		<?php echo $form->error($model,'translate_key'); ?>
		</div><!-- row -->
		<?php endif;?>
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description', array('class'=>'textarea-m')); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model, 'ordering', array('style'=>'width: 50px')); ?>
		<?php echo $form->error($model,'ordering'); ?>
		</div><!-- row -->
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->
