<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'gallery-category-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php 
		if($model->image!=''){
			echo '<img width="180" src="'.Yii::app()->params['gallery_url'].'/thumb/'.$model->image.'" />';
		}
		?>
		<input type="file" name="image" />
		<?php echo $form->error($model,'image'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description',array('class'=>'textarea-m')); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->