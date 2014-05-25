<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('poll-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
  'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('application.widgets.iGridView', array(
  	'id'=>'poll-grid',
  	'dataProvider'=>$model->search(),
  	'columns'=>array(
	array(
			'type'	=>	'raw',
			'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
			'htmlOptions'	=>	array(
				'width'	=>	'50',
			),
			'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))'
	),
	array(
		'name'	=>	'title',
		'value'	=>	'CHtml::link(CHtml::encode($data->title), array("poll/update","id"=>$data->id))',
		'type'	=>	'raw'
	),
    'description',
    array(
            'class'=>'JToggleColumn',
            'name'=>'status', // boolean model attribute (tinyint(1) with values 0 or 1)
            'htmlOptions'=>array('style'=>'text-align:center;min-width:60px;'),
		 	'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
	),
    array(
    	'name'	=>	'id',
    	'htmlOptions'	=>	array('width'=>'30'),
    ),
	array(
		'class'=>'application.widgets.iButtonColumn',
  		'htmlOptions'=>array('style'=>'width: 50px'),
  	),
 	),
)); ?>
