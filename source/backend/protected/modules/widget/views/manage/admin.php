<div class="btn-toolbar">
<?php 
$widgets = Yii::app()->params['widgets'];
$html="";
foreach ($widgets as $key => $value){
	$data[]= 	array('label'=>$value['title'], 'url'=>Yii::app()->createUrl('/widget/manage/create', array('name'=>$value['class'])));
	$html .= "<li><a href='".Yii::app()->createUrl('/widget/manage/create', array('name'=>$value['class']))."'>{$value['title']}</a></li>";
}
?>

<?php 
$this->btnOptions = '<div class="btn-group pull-right">
						<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
						    Create Widget <span class="caret"></span>
						</button>
					<ul class="dropdown-menu">
						'.$html.'
					</ul>
					</div>';
?>
</div>
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('widgets-grid', {
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

<?php $this->widget('application.widgets.iGridView', array(
	'id' => 'widgets-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id)" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array('width'=>50),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))'
		),
		array(
			'name'	=>	'title',
			'type'	=>'raw',
			'value'	=>	'CHtml::link($data->title, array("manage/update","id"=>$data->id))',
		),
		'widget_name',
		array(
            'class'=>'JToggleColumn',
            'name'=>'show_title', // boolean model attribute (tinyint(1) with values 0 or 1)
            'htmlOptions'=>array('width'=>90),
		 	'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
        ),
		array(
			'name'	=>	'ordering',
			'htmlOptions'	=>	array('width'=>60)
		),
		array(
            'class'=>'JToggleColumn',
            'name'=>'published', // boolean model attribute (tinyint(1) with values 0 or 1)
            'htmlOptions'=>array('width'=>60),
		 	'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
        ),
		/*
		'position',
		'params',
		'created',
		'created_by',
		'modified',
		'modified_by',
		array(
					'name' => 'published',
					'value' => '($data->published === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
		*/
		array(
			'name'	=>	'id',
			'htmlOptions'	=>	array('width'=>30)
		),
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('width'=>50),
		),
	),
)); ?>
