<div class="form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'widgets-form',
	'enableAjaxValidation' => false,
));
?>
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->error($model,'widget_name'); ?>
		<div class="row row-s1">
			<?php echo $form->labelEx($model,'published'); ?>
			<?php echo $form->checkBox($model, 'published'); ?>
		</div>
		<div class="row row-s1">
			<?php echo $form->labelEx($model,'ordering'); ?>
			<?php echo $form->textField($model, 'ordering'); ?>
		</div>
		<div class="row row-s1">
			<?php echo $form->labelEx($model,'show_title'); ?>
			<?php echo $form->checkBox($model, 'show_title'); ?>
		</div>
		<div class="row row-s1">
			<?php echo $form->labelEx($model,'position'); ?>
			<?php 
			$data = CHtml::listData(BackendWidgetsPositionModel::model()->published()->findAll(), 'id', 'name');
			echo $form->dropDownList($model,'position', $data);
			?>
		</div>
		<div class="row row-s1">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 255, 'class'=>'textField-l')); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row" style="display: none;">
		<?php 
			$model->widget_name = ($model->widget_name!='')?$model->widget_name:$widget_name;
			echo $form->textField($model, 'widget_name',array('maxlength' => 255));
		?>
		</div><!-- row -->
		
		<?php if($model->widget_name!=''):?>
		<div class="row el-dialogform">
			<fieldset><legend>Params</legend>
			<?php 
				$wd = new $model->widget_name;
				$wd->buildParams($model->params);
			?>
			</fieldset>
		</div>
		<?php else:?>
			<div class="row">
				<fieldset><legend>Params</legend>
				<?php 
						$wd = new $widget_name;
						$wd->buildParams();
				?>
				</fieldset>
			</div>
		<?php endif;?>
<input type="hidden" name="apply" id="apply" value="0" />
<?php
$this->endWidget();
?>
</div><!-- form -->