<?php $this->beginWidget('webroot.widgets.iButtonBar');?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Cancel'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'remove-sign white',
    'url'=> Yii::app()->createUrl('/polls/poll/admin'),
));?>
<?php $this->endWidget();?>

<?php 
$this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Export Options')));
?>
<div class="form">
  <?php echo $cform->render(); ?>
</div>
<?php $this->endWidget();
?>