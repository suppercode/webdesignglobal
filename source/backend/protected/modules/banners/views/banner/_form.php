<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'banner-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<?php echo $form->errorSummary($model); ?>
	
		<div class="row">
			<?php echo $form->labelEx($model,'content'); ?>
			<?php echo $form->fileField($model, 'content', array('maxlength' => 255)); ?>
			<?php echo $form->error($model,'content'); ?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->textField($model, 'client_id'); ?>
		<?php echo $form->error($model,'client_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model, 'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'clicks'); ?>
		<?php echo $form->textField($model, 'clicks'); ?>
		<?php echo $form->error($model,'clicks'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'params'); ?>
		<?php echo $form->textArea($model, 'params'); ?>
		<?php echo $form->error($model,'params'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'click_url'); ?>
		<?php echo $form->textField($model, 'click_url', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'click_url'); ?>
		</div><!-- row -->
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->