<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
?>
<div class="login-box">
	<h2>
		<a href="#"><?php echo Yii::t("main","Login"); ?></a>
	</h2>
	<hr />
<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>


<div class="form">
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($model); ?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username') ?>
	</div>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password') ?>
	</div>
	<div class="row rememberMe">
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php echo CHtml::activeLabelEx($model,'rememberMe', array('class'=>'inline-block')); ?>
	</div>
	<div class="row submit">
		<?php echo CHtml::submitButton(Yii::t("main","Login"), array('class'=>'add-btn button p0')); ?>
	</div>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
</div>