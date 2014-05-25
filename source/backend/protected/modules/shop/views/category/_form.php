<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data', 'name'=>'category-form'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php if($model->image!=''):?>
		<img src="<?php echo Yii::app()->params['shop_url'].$model->image;?>" />
		<?php endif;?>
		<input type="file" name="file" value="" />
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php
		$meid = ($model->category_id>0)?$model->category_id:0;
		$items_list = Category::model()->findAll("published=1 ORDER BY position ASC");
		$items = CHtml::listData($items_list, 'category_id', 'title_tree');
		echo '<select name="Category[parent_id]" id="Category_parent_id">';
		echo '<option value="0">--None--</option>';
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

<input type="hidden" name="apply" id="apply" value="0" />
<?php $this->endWidget(); ?>
</div><!-- form -->
