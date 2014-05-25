<ul>
<?php foreach($widgets as $key => $value):?>
	<li><a href="<?php echo Yii::app()->createUrl('/widget/manage/create', array('name'=>$value['class']));?>"><?php echo $value['title'];?></a></li>
<?php endforeach;?>
</ul>