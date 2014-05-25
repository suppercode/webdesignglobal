<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<h2 style="color: #d9d9d9;zoom: 8;margin:0;text-align: center"><?php echo $code; ?></h2>
<div class="error" style="text-align: center">
<?php echo CHtml::encode($message); ?>
</div>
