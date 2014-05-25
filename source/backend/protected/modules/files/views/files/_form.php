<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'files-form',
	'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data', 'name'=>'files-form'),
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'source_path'); ?>
		<?php 
			if(isset($model->source_path)) echo $model->source_path;
		?>
		<input type="file" name="file" value="" />
		
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'download'); ?>
		<?php echo $form->textField($model, 'download'); ?>
		<?php echo $form->error($model,'download'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'view'); ?>
		<?php echo $form->textField($model, 'view'); ?>
		<?php echo $form->error($model,'view'); ?>
		</div><!-- row -->

<?php
$this->endWidget();
?>
</div><!-- form -->