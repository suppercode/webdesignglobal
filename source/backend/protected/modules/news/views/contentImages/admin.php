<?php $this->beginWidget('webroot.widgets.iButtonBar');?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create image type'),
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'icon'=>'plus-sign white',
    'url'=> array('create'),
	'htmlOptions'=>array('style'=>'width: 145px;')
));?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Advanced Search'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'icon'=>'search white',
    'url'=> '#',
	'htmlOptions'=>array('class'=>'search-button')
));?>
<?php $this->endWidget();?>
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('content-images-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form">
<?php $this->beginWidget('webroot.widgets.iPortlet', array('title'=>Yii::t('main','Advanced Search')));?>
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
<?php $this->endWidget();?>
</div><!-- search-form -->
<?php 
	Yii::app()->clientScript->registerScript('tooltip2', "jQuery('.button-column a').tooltip();");
?>
<?php $this->widget('webroot.widgets.iGridView', array(
	'id' => 'content-images-grid',
	'dataProvider' => $model->search(),
	'afterAjaxUpdate'=>'function(){jQuery(".button-column a").tooltip();}',
	'columns' => array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id)" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array(
				'width'	=>	'50',
			),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))'
		),
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->name), array("contentImages/update","id"=>$data->id))'
		),
		'width',
		'height',
		'description',
		array(
			'name'=>'id',
			'htmlOptions'	=>	array(
				'width'	=>	'30',
				'align'	=>	'center'
			),
		),
		array(
				'class'=>'webroot.widgets.iButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
