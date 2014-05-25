<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menu-items-grid', {
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
	'id' => 'menu-items-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
			'name'	=>	'title_tree',
			'type'	=>	'raw',
			'value'	=>	'CHtml::link(CHtml::encode($data->title_tree), array("menuItems/update","id"=>$data->id))'
		),
		'alias',
		array(
			'name'=>'menu_group',
			'value'=>'$data->group->name'
		),
		array(
			'name'=>'ordering',
			'htmlOptions'=>array('width'=>50)
		),
		array(
			'name'=>'level',
			'htmlOptions'=>array('width'=>50)
		),
		 array(
            'class'=>'JToggleColumn',
            'name'=>'published', // boolean model attribute (tinyint(1) with values 0 or 1)
            'htmlOptions'=>array('width'=>60),
		 	'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
        ),
		array(
			'name'=>'id',
			'htmlOptions'=>array('width'=>50)
		),
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('width'=>50),
		),
	),
)); ?>