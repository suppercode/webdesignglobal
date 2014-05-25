<?php
$this->beginWidget('webroot.widgets.iButtonBar');
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main','Create ContactModel'),
    'type'=>'success',
    'icon'=>'plus-sign white',
    'url'=> array('create'),
));
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('main', 'Advanced Search'),
    'type'=>'primary',
	'icon'=>'search white',
    'url'=> '#',
	'htmlOptions'=>array('class'=>'search-button')
));
$this->endWidget();

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contact-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('backend.widgets.iGridView', array(
	'id' => 'contact-model-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'subject',
		'name',
		'email',
		'mobile',
		'content',
		/*
		'created_datetime',
		array(
					'name' => 'status',
					'value' => '($data->status === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		*/
		array(
			'class'=>'webroot.widgets.iButtonColumn',
			'htmlOptions'=>array('width'=>'50'),
		),
	),
)); ?>