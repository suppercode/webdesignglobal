<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'content-images-form',
	'enableAjaxValidation' => false,
));
?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
	<?php echo $form->error($model,'name'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'width'); ?>
	<?php echo $form->textField($model, 'width'); ?>
	<?php echo $form->error($model,'width'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'height'); ?>
	<?php echo $form->textField($model, 'height'); ?>
	<?php echo $form->error($model,'height'); ?>
	</div><!-- row -->
	<div class="row">
	<?php echo $form->labelEx($model,'description'); ?>
	<?php echo $form->textArea($model, 'description', array('class'=>'textarea-m')); ?>
	<?php echo $form->error($model,'description'); ?>
	</div><!-- row -->

<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->